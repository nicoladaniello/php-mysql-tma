<?php

class View
{
    protected $template_dir = '../templates/';
    protected $vars = array();

    /**
     * Renders a template
     */
    public function render($template_file)
    {
        if (file_exists($this->template_dir . $template_file)) {
            include $this->template_dir . $template_file;
        } else {
            throw new Exception($this->template_dir . $template_file . ' doesn\'t exists!');
        }
    }


    /**
     * Pass variables to the template
     */
    public function __set($name, $value)
    {
        $this->vars[$name] = $value;
    }


    /**
     * Read varaiables from template
     */
    public function __get($name)
    {
        return $this->vars[$name];
    }
}
