<?php

/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/1/17
 * Time: 2:57 PM
 */
namespace classes\core;

use classes\model\Model;
use classes\view\View;
use classes\controller\LoginController;
use classes\controller\ContactController;

class App
{
    /*
     * Building page content with parameter 'p'.
     */
    public $page;
    private $homepage = "home";
    private $notFound = "404";

    // Frontend page
    private $frontendNav = array(
        "home" => "Home",
        "about" => "About Us",
        "how" => "How it Works",
        "talent" => "The Talent",
        "login" => "Login",
    );

    // Backend page
    private $backendNav = array(
        "home" => "Home",
        "how" => "How it Works",
        "profile" => "Profile",
    );

    // Footer page
    private $footer = array(
        "faq" => "FAQ",
        "job" => "Jobs",
        "blog" => "Blog",
        "team" => "Team",
        "contact" => "Contact"

    );

    public static $nav = [];

    public function __construct()
    {
        session_start();

        /* Navigation
         * Building Navigation & Footer
         */
        self::$nav['frontend'] = $this->frontendNav;
        self::$nav['backend'] = $this->backendNav;
        self::$nav['footer'] = $this->footer;

        $this->request = array_merge($_GET, $_POST);
        $this->view = new View();
    }


    /*
     * Navigation with Role for Backend and Frontend
     * show Navigation Backend & Frontend
     */
    public static function navigation($role)
    {
        /*
         * Problem in Login form is solved!
         */

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

    /*
     * Footer Template
     * show the footer link page
     */
    public static function footerTpl()
    {
        $file = "inc/footer.php";
        if (file_exists($file)) {
            include $file;
        }
    }

    /*
     * Execute the code.
     */
    public function execute()
    {
        $this->page = $this->validationPage($this->request['p']);


        /* TODO: Ask Marten! Hilfe.
         * Diese Methode funktionert nicht. Eigentlich wollte ich mein Footer validieren.
         * Wenn diese Methode ich aktiviere, dann funktioniert Validation des Frontends.
         *
         * $this->page = $this->validationFooter($this->request['p']);
         *
         * Hilfe dringend! Wie sollte ich machen?
         *
         */

        $this->logout();

        switch ($this->page) {
            // Load different Model & Controller
            case "home" :

                break;

            case "talent":
                $talentContact = new ContactController();
                try {
                    $talentContact->validation($this->request["talent"]);
                } catch (\Exception $e) {
                    echo "Failed contact the talent " . $e->getMessage();
                }
                break;
            case "contact" :
                $contactCont = new ContactController();
                try {
                    $contactCont->validation($this->request["contact"]);
                    $this->view->status = $contactCont->status;
                } catch (\Exception $e) {
                    echo "Contact failed " . $e->getMessage();
                }
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

    /* TODO: Ask Marten!
     * Validation Page Content for Backend & Frontend
     * But backend & footer are still not working at all.
     */
    public function validationPage($getParam)
    {
        // Validation Page Content
        if (!isset($getParam) || empty($getParam)) {
            return $this->homepage;
        } else {
            if ($_SESSION["role"]) {
                // Backend & Frontend
                if ((array_key_exists($getParam, $this->frontendNav) or array_key_exists($getParam, $this->footer)) or
                    (array_key_exists($getParam, $this->backendNav) or array_key_exists($getParam, $this->footer))
                ){
                    return $getParam;
                } else {
                    return $this->notFound;
                }
            } else {
                if (!array_key_exists($getParam, $this->frontendNav) and !array_key_exists($getParam,$this->footer)) {
                    return $this->notFound;
                } else {
                    return $getParam;
                }
            }
        }
    }

    /* TODO: Ask Marten!
     * Validation Footer Page (But not working).
     * I don't have idea, why :(

    public function validationFooter($param)
    {
        if (!isset($param) || empty($param)) {
            return $this->homepage;
        } else {
            if (array_key_exists($param, $this->footer)) {
                return $param;
            } else {
                return $this->notFound;
            }
        }
    }
    */

    /*
    * logout Function is to destroy session
    */
    private function logout()
    {
        if ($_GET['logout'] == "true") {
            session_unset();
            session_destroy();
            Model::newDestination("home");
        }
    }


}


