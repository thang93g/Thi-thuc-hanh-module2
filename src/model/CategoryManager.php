<?php


namespace Prd\model;


class CategoryManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `categories`";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $array = [];
        foreach ($data as $item){
            $category = new Category($item['category']);
            $category->setId($item['id']);
            array_push($array,$category);
        }
        return $array;
    }

    public function getIdByName($name)
    {
        $sql = "SELECT * FROM `categories` WHERE category = :name";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":name",$name);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data['id'];
    }
}