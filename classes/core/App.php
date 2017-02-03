<?php

/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/1/17
 * Time: 2:57 PM
 */
namespace classes\core;

use classes\controller\NewsController;
use classes\model\Model;
use classes\view\View;
use classes\controller\LoginController;
use classes\controller\ContactController;

class App
{
    /* Session 1
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
        "news" => "News & Deadlines",
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


    /* Navigation with Role for Backend and Frontend
     * show Navigation Backend & Frontend
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

    /* Footer Template
     * show footer link page
     */
    public static function footerTpl()
    {
        $file = "inc/footer.php";
        if (file_exists($file)) {
            include $file;
        }
    }

    /* Execute the code.
     * Load the different Model & Controller in SWITCH CASE function.
     */
    public function execute()
    {
        $this->page = $this->validationPage($this->request['p']);

        $this->logout();

        switch ($this->page) {
            case "home" :
                break;
            case "news":
                $this->view->news = new NewsController();
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
                ) {
                    return $getParam;
                } else {
                    return $this->notFound;
                }
            } else {
                if (!array_key_exists($getParam, $this->frontendNav) and !array_key_exists($getParam, $this->footer)) {
                    return $this->notFound;
                } else {
                    return $getParam;
                }
            }
        }
    }

    // Logout function destroys session
    private function logout()
    {
        if ($_GET['logout'] == "true") {
            session_unset();
            session_destroy();
            Model::newDestination("home");
        }
    }
}


