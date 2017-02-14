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

    /**
     * Database
     * @var \PDO
     */
    protected $db;

    /**
     * Model constructor.
     */
    public function __construct()
    {
        $this->db = Database::getDatabase();
    }

    /**
     * Create a new destination model
     * @param $destination
     */
    public static function newDestination($destination)
    {
        header("Location: ?p=" . $destination);
        exit();
    }

    /**
     * Get all array in MySQL
     * @param $sql
     * @param $array
     * @return array
     */
    public function get($sql, $array)
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($array);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Set all array in MySQL
     * @param $sql
     * @param array $execArr
     */
    public function set($sql, $execArr = array())
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($execArr);
    }

}