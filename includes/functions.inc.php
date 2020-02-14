<?php
require_once(__DIR__ . '/config.inc.php');

/** The directory of the files to render */
$view_dir = dirname(__DIR__) . '/views/';
/** The extension of the files to render */
$view_files_ext = '.view.php';
/** The directory of the files to render */
$template_dir = dirname(__DIR__) . '/templates/';
/** The extension of the files to render */
$template_files_ext = '.tpl.html';
/** Opening tag for template variables */
$template_open_tag = '[+';
/** Closing tag for template variables */
$template_close_tag = '+]';
/** Regex that mathes tags in templates */
$template_tags_finder_exp = '/\[\+(.*?)\+\]/';


/**
 * Fill a template with the respective values.
 * 
 * @param string $file_name The name of the template file.
 * @param array $key_vals A key-value pair array with the template keys and the respective value.
 * @return string The formatted template.
 * @throws Exception If file doesn't exist or can't be accessed
 */
function parse_template(string $file_name, array $key_vals = [])
{
    global $template_dir, $template_files_ext, $template_tags_finder_exp, $template_open_tag, $template_close_tag;

    $file_path = $template_dir . $file_name . $template_files_ext;
    if (!file_exists($file_path)) {
        throw new Exception('Couldn\'t find the file: ' . $file_path);
    }

    $tpl = file_get_contents($file_path);
    if ($tpl === false) {
        throw new Exception('Couldn\'t read the file: ' . $file_path);
    }

    // Replace template tags with values
    foreach ($key_vals as $key => $value) {
        $tag = $template_open_tag . $key . $template_close_tag;
        $tpl = str_replace($tag, $value, $tpl);
    }

    // ensure no tags are left in the template
    return preg_replace($template_tags_finder_exp, '', $tpl);
}


/**
 * Helper class to pass variables to a view and render to screen.
 * 
 * Usage: pass variables to the view using the _set() function,
 * then use render() to display the view.
 */
class View
{
    private $vars = array();
    /**
     * Renders a View to screen.
     * 
     * @param string $file_name The name of the View file
     * @return void
     */
    public function render(string $file_name)
    {
        global $view_dir, $view_files_ext;
        $file_path = $view_dir . $file_name . $view_files_ext;

        if (!file_exists($file_path)) {
            throw new Exception('Couldn\'t find file: ' . $file_path);
        }

        include $file_path;
    }


    /**
     * Set a variable inside the class.
     * To use to pass variables to a template.
     * 
     * @param string $name The name of the variable
     * @param $value The value of the variable
     * @return void
     */
    public function __set(string $name, $value)
    {
        $this->vars[$name] = $value;
    }


    /**
     * Return the named value.
     * 
     * @param string $name The name of the variable
     * @return void
     */
    public function __get($name)
    {
        return $this->vars[$name];
    }
}
