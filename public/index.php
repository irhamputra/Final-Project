<?php
/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/1/17
 * Time: 2:51 PM
 */

/**
 * Define the constant for server.
 * It can be different in your own server setting
 */
define("__HOST__", "localhost");
define("__DBNAME__", "finalproject");
define("__USER__", "root");
define("__PASSWORD__", "root");

require_once "../vendor/autoload.php";

use classes\core\App;

$app = new App();
echo $app->execute();
