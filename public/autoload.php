<?php
/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/1/17
 * Time: 3:24 PM
 */

spl_autoload_register(function ($class) {
    $file = '../' . str_replace("\\", "/", $class) . '.php';
    if (file_exists($file)) {
        require $file;
        return true;
    }
});