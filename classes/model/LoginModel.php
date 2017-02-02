<?php
/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/2/17
 * Time: 11:29 AM
 */

namespace classes\model;


class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSignInData($data)
    {
        $sql = "SELECT * FROM users 
                WHERE user_username = :username 
                AND user_password = :password";

        $execArr = [":username" => $data["Username"], ":password" => md5($data["Password"])];
        return $this->get($sql, $execArr);
    }
}