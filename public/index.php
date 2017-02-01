<?php
/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/1/17
 * Time: 2:51 PM
 */

require_once "autoload.php";

use classes\core\App;

$app = new App();
echo $app->execute();
