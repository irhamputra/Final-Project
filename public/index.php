<?php
/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/1/17
 * Time: 2:51 PM
 */

define("__HOST__", "localhost");
define("__DBNAME__", "finalproject");
define("__USER__", "root");
define("__PASSWORD__", "root");

require_once "../vendor/autoload.php";

use classes\core\App;

$app = new App();
echo $app->execute();
