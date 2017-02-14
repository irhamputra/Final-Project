<?php
/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/2/17
 * Time: 11:29 AM
 */

namespace classes\model;

/**
 * Class LoginModel
 * @package classes\model
 */
class LoginModel extends Model
{
    /**
     * LoginModel constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Validate to sign in the user
     * @param $data
     * @return array
     */
    public function getSignInData($data)
    {
        $sql = "SELECT * FROM users 
                WHERE user_username = :username 
                AND user_password = :password";

        $execArr = [":username" => $data["Username"], ":password" => md5($data["Password"])];
        return $this->get($sql, $execArr);
    }
}