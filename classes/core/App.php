<?php

/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/1/17
 * Time: 2:57 PM
 */
namespace classes\core;

use classes\view\View;
use classes\controller\LoginController;

class App
{
    public $page;
    private $homepage = "home";

    private $frontendNav = array(
        "home" => "Homepage",
        "how" => "How it Works",
        "contact" => "Contact",
        "login" => "Login",
    );

    private $footer = array(
        "faq" => "FAQ",
        "job" => "Jobs",
        "about" => "About Us"
    );

    public static $nav = [];

    public function __construct()
    {
        self::$nav['frontend'] = $this->frontendNav;
        self::$nav['footer'] = $this->footer;

        $this->request = array_merge($_GET, $_POST);
        $this->view = new View();
    }

    public static function navigation($role)
    {
        if (!isset($role) || empty($role)) {
            $file = "inc/frontend.php";
            if (file_exists($file)) {
                include $file;
            }
        }
    }

    public static function footerTpl()
    {
        $file = "inc/footer.php";
        if (file_exists($file)) {
            include $file;
        }
    }

    public function validationPage($getParam)
    {
        if (!isset($getParam) || empty($getParam)) {
            return $this->homepage;
        } else {
            if (!array_key_exists($getParam, $this->frontendNav) && !array_key_exists($getParam, $this->footer)) {
                return $this->homepage;
            } else {
                return $getParam;
            }
        }
    }

    public function execute()
    {
        $this->page = $this->validationPage($this->request['p']);

        switch ($this->page) {
            case "home" :

                break;

            case "how it works" :

                break;

            case "contact" :

                break;

            case "login" :

                break;
        }


        $this->view->setTemplate("default");
        $this->view->pageContent = $this->page . ".php";

        try {
            return $this->view->parse();
        } catch (\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }
}
