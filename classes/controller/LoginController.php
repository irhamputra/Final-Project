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

class LoginController
{
    public $status;
    private $loginModel;

    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
        $this->loginModel = new LoginModel();
        $this->execute();
    }

    public function execute()
    {
        $this->validationSignIn($this->request['login']);
    }

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
                $_SESSION["username"] = $results[0]["user_username"];
                $_SESSION["id"] = $results[0]["user_id"];
                $_SESSION["role"] = $results[0]["user_role"];

                Model::newDestination("profile");
            }
        }

    }

}