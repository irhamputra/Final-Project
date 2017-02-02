<?php

/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/2/17
 * Time: 10:10 AM
 */
namespace classes\database;

trait Database
{
    public static function getDatabase()
    {
        try {
            return new \PDO('mysql:host=' . __HOST__ . ';dbname=' . __DBNAME__ . '', __USER__, __PASSWORD__, array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING, \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        } catch (\Exception $e) {
            echo "Connection Failed! " . $e->getMessage();
        }
    }
}