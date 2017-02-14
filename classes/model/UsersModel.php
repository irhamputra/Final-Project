<?php
/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/4/17
 * Time: 2:55 PM
 */

namespace classes\model;

/**
 * Class UsersModel
 * @package classes\model
 */
class UsersModel extends Model
{
    /**
     * UsersModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get data from db
     * @return array
     */
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        return $this->get($sql, array());
    }

    /**
     * Insert data user to db
     * @param $data
     */
    public function insertUsers($data)
    {
        $sql = "INSERT INTO `users` (user_username, user_password, user_email, user_role)
                VALUES (:username, :password, :email, :role)";
        $this->set($sql, [
            ":username" => $data["Username"],
            ":password" => md5($data["Password"]),
            ":email" => $data["Email"],
            ":role" => $data["Role"],
        ]);
    }
}