<?php
/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/1/17
 * Time: 2:51 PM
 */

define("__HOST__", "localhost");
define("__DBNAME__", "finalproject");
define("__USER__", "root");
define("__PASSWORD__", "root");

require_once "autoload.php";

use classes\core\App;

$app = new App();
echo $app->execute();
