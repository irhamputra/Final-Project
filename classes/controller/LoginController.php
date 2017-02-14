<?php
/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/1/17
 * Time: 3:57 PM
 */

namespace classes\controller;

use classes\model\LoginModel;
use classes\model\Model;

/**
 * Control login form, all form must be validated and when success, user can go to profile page automatically
 * Class LoginController
 * @package classes\controller
 */
class LoginController
{
    /**
     * All status
     * @var
     */
    public $status;

    /**
     * @var LoginModel
     */
    private $loginModel;

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
        $this->loginModel = new LoginModel();
        $this->execute();
    }

    /**
     * Execute the code
     */
    public function execute()
    {
        $this->validationSignIn($this->request['login']);
    }

    /**
     * Validate data in signin form
     * @param $data
     */
    public function validationSignIn($data)
    {
        if (isset($data["submit"])) {
            if (!isset($data["Username"]) || empty($data["Password"])) {
                $this->status["error"] = "Please fill the input";
            }
        }

        if (empty($this->status["error"])) {
            $results = $this->loginModel->getSignInData($data);
            if (count($results) > 0) {
                $_SESSION["id"] = $results[0]["user_id"];
                $_SESSION["username"] = $results[0]["user_username"];
                $_SESSION["role"] = $results[0]["user_role"];
                $_SESSION["created"] = $results[0]["user_created"];
                Model::newDestination("profile");
            }
        }

    }

}