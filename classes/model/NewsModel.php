<?php
/**
 * Created by PhpStorm.
 * User: MacbookPro
 * Date: 2/3/17
 * Time: 10:00 PM
 */

namespace classes\model;


class NewsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getNews()
    {
        $sql = "SELECT * FROM news ";
        return $this->get($sql, array());
    }

    public function insertNews($data)
    {
        $sql = "INSERT INTO `news` (news_title, news_description, news_image_url, news_deadline) 
                VALUES (:title, :description, :image_url, :deadline)";
        $this->set($sql, [
            ":title" => $data["Title"],
            ":description" => $data["Description"],
            ":image_url" => $data["ImageUrl"],
            ":deadline" => $data["Deadline"],
        ]);

    }
}