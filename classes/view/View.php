<?php

/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/1/17
 * Time: 3:36 PM
 */
namespace classes\view;

class View
{
    private $template;
    private $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        if (isset($this->data[$name])) {
            return $this->data[$name];
        } else {
            throw new \InvalidArgumentException("$name is missing");
        }
    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this->data[$name] = $value;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function parse()
    {
        $output = "";

        $file = "template/" . $this->template . ".php";
        if (file_exists($file)){
            ob_start();
            include $file;
            $output = ob_get_contents();
            ob_get_clean();
        } else {
            echo "template/" . $this->template . ".php not found";
        }
        return $output;
    }
}