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

/**
 * Control user that want to add to model
 * Class UsersController
 * @package classes\controller
 */
class UsersController
{
    public $allUsers;
    public $status;
    private $request, $model;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
        $this->model = new UsersModel();
        $this->execute();
    }

    /**
     * Execute the code
     */
    public function execute()
    {
        $this->checkUsersIn($this->request["signup"]);
    }

    /**
     * Insert the user data in login session
     * @param $data
     */
    public function checkUsersIn($data)
    {
        if ($data["submit"]){
            if (empty($this->status["error"]))
            {
                $this->model->insertUsers($data);
                Model::newDestination("login");
                exit();
            }
        }
    }
}