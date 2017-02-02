<?php

/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/1/17
 * Time: 2:57 PM
 */
namespace classes\core;

use classes\model\Model;
use classes\view\View;
use classes\controller\LoginController;

class App
{
    public $page;
    private $notFound = "404";

    private $frontendNav = array(
        "home" => "Home",
        "about" => "About Us",
        "how" => "How it Works",
        "gallery" => "Browse Gallery",
        "login" => "Login",
    );


    private $backendNav = array(
        "profile" => "Profile",
        "logout" => "Log Out"
    );


    private $footer = array(
        "faq" => "FAQ",
        "job" => "Jobs",
        "blog" => "Blog",
        "team" => "Team",
        "contact" => "Contact",
    );

    public static $nav = [];

    public function __construct()
    {

        session_start();
        self::$nav['frontend'] = $this->frontendNav;
        self::$nav['backend'] = $this->backendNav;
        self::$nav['footer'] = $this->footer;

        $this->request = array_merge($_GET, $_POST);
        $this->view = new View();
    }

    // TODO: Ask Marten! HILFE!
    /*
     * Dies ist auch genauso nicht funktioniert. Wenn ich zur Webseite gehe, dann ist Backends Navigation da.
     * Wenn ich if(!isset($role) schreibe, dann kommt die Frontend Navigation.
     * Hilfe!
     *
     */

    public static function navigation($role)
    {
        if (isset($role)) {
            $file = "inc/backend.php";
            if (file_exists($file)) {
                include $file;
            }
        } else {
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
        // Validation Page Content
        if (!isset($getParam) || empty($getParam)) {
            return $this->notFound;
        } else {
            if ($_SESSION["role"]) {
                if (array_key_exists($getParam, $this->backendNav) ||
                    array_key_exists($getParam, $this->frontendNav) &&
                    array_key_exists($getParam, $this->footer)
                ) {
                    return $getParam;
                } else {
                    return $this->notFound;
                }
            } else {
                if (!array_key_exists($getParam, $this->frontendNav)) {
                    return $this->notFound;
                } else {
                    return $getParam;
                }
            }
        }
    }

    public function validationFooter($param){
        if (!isset($param) || empty($param)){
            return $this->notFound;
        } else {
            if (array_key_exists($param, $this->footer)){
                return $param;
            } else {
                return $this->notFound;
            }
        }
    }

    private function logout()
    {
        if ($_GET['logout'] == "true") {
            session_unset();
            session_destroy();
            Model::newDestination("home");
        }
    }

    public function execute()
    {
        $this->page = $this->validationPage($this->request['p']);

        // TODO: Ask Marten!
        /*
         * Diese Methode funktionert nicht. Eigentlich wollte ich mein Footer validieren.
         * Wenn diese Methode ich aktiviere, dann funktioniert Validation des Frontends
         *
         * $this->page = $this->validationFooter($this->request['p']);
         *
         * Hilfe dringend! Wie sollte ich machen?
         *
         */

        $this->logout();

        switch ($this->page) {
            case "home" :

                break;

            case "contact" :

                break;

            case "login" :
                try {
                    $login = new LoginController();
                } catch (\Exception $e) {
                    echo "Login failed " . $e->getMessage();
                }
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


