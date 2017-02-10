<?php
/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/4/17
 * Time: 2:54 PM
 */

namespace classes\controller;

use classes\model\Model;
use classes\model\UsersModel;
class UsersController
{
    public $allUsers;
    public $status;
    private $request, $model;

    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
        $this->model = new UsersModel();
        $this->execute();
    }

    public function execute()
    {
        $this->checkUsersIn($this->request["signup"]);
    }

    public function checkUsersIn($data)
    {

        if ($data["submit"]){

            if (empty($this->status["error"]))
            {
                $this->model->insertUsers($data);
                Model::newDestination("login");
            }
        }
    }
}