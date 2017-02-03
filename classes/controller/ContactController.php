<?php
/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/1/17
 * Time: 5:47 PM
 */

namespace classes\controller;

use classes\model\ContactModel;
class ContactController
{
    public $status = array();

    public function __construct()
    {

    }

    public function validation($data)
    {
        if (isset($data["submit"])) {
            foreach ($data as $input => $value) {
                if (empty($value)) {
                    $this->status[] = "Please fill this field: " . $input;
                }
            }

            if (empty($this->status)) {
                $contactModel = new ContactModel();
                $contactModel->sendContact($data);
            }
        }

    }

}