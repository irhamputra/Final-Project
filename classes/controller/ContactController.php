<?php
/**
 * Created by PhpStorm.
 * User: Muhamad Irham Prasetyo
 * Date: 2/1/17
 * Time: 5:47 PM
 */

namespace classes\controller;

use classes\model\ContactModel;

/**
 * Controll all contact field
 * Class ContactController
 * @package classes\controller
 */
class ContactController
{
    /**
     * All status contact
     * @var array
     */
    public $status = array();

    /**
     * ContactController constructor.
     */
    public function __construct()
    {

    }

    /**
     * Validate data in contact form
     * @param $data
     */
    public function validation($data)
    {
        if (isset($data["submit"])) {
            foreach ($data as $input => $value) {
                if (empty($value) && $input != "submit") {
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