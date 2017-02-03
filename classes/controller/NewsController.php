<?php
/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/3/17
 * Time: 10:00 PM
 */

namespace classes\controller;

use classes\model\Model;
use classes\model\NewsModel;
class NewsController
{
    public $allNews;
    public $status;
    private $request, $model;

    public function __construct()
    {
        $this->request = array_merge($_GET, $_POST);
        $this->model = new NewsModel();
        $this->execute();
    }

    public function execute()
    {
        $this->allNews = $this->model->getNews();
        $this->checkNews($this->request["news"]);
    }

    public function checkNews($data)
    {
        if ($data["submit"]){
            if (empty($this->status["error"]))
            {
                $this->model->insertNews($data);
                Model::newDestination("news");
            }
        }

    }
}