<?php

/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/1/17
 * Time: 5:03 PM
 */
namespace classes\model;

use classes\database\Database;

/**
 * Core Model application
 * Class Model
 * @package classes\model
 */
class Model
{
    use Database;

    protected $db;

    public function __construct()
    {
        $this->db = Database::getDatabase();
    }

    public static function newDestination($destination)
    {
        header("Location: ?p=" . $destination);
        exit();
    }

    public function get($sql, $array)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function set($sql, $execArr = array())
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($execArr);
    }

}