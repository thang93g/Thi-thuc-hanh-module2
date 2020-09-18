<?php


namespace Prd\model;


class ProductManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT a.id,a.name,categories.category,a.price,a.quantity,a.create_date,a.description
FROM `products` AS a
INNER JOIN categories
ON a.category = categories.id
ORDER BY a.id";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $array = [];
        foreach ($data as $item){
            $product = new Product($item['name'],$item['category'],$item['price'],$item['quantity'],$item['create_date'],$item['description']);
            $product->setId($item['id']);
            array_push($array,$product);
        }
        return $array;
    }

    public function add($product)
    {
        $sql = "INSERT INTO `products`(`name`, `category`, `price`, `quantity`, `create_date`, `description`) VALUES (:name,:category,:price,:quantity,:create_date,:description)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":name",$product->getName());
        $stmt->bindParam(":category",$product->getCategory());
        $stmt->bindParam(":price",$product->getPrice());
        $stmt->bindParam(":quantity",$product->getQuantity());
        $stmt->bindParam(":create_date",$product->getCreateDate());
        $stmt->bindParam(":description",$product->getDescription());
        $stmt->execute();
    }

    public function search($key)
    {
        $sql = "SELECT a.id,a.name,categories.category,a.price,a.quantity,a.create_date,a.description
FROM `products` AS a
INNER JOIN categories
ON a.category = categories.id
WHERE name LIKE :key
ORDER BY a.id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":key",$key);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $array = [];
        foreach ($data as $item){
            $product = new Product($item['name'],$item['category'],$item['price'],$item['quantity'],$item['create_date'],$item['description']);
            $product->setId($item['id']);
            array_push($array,$product);
        }
        return $array;
    }

    public function edit($product)
    {
        $sql = "UPDATE `products` SET `name`=:name,`category`=:category,`price`=:price,`quantity`=:quantity,`description`= :description WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id",$product->getId());
        $stmt->bindParam(":name",$product->getName());
        $stmt->bindParam(":category",$product->getCategory());
        $stmt->bindParam(":price",$product->getPrice());
        $stmt->bindParam(":quantity",$product->getQuantity());
        $stmt->bindParam(":description",$product->getDescription());
        $stmt->execute();
    }

    public function getProductById($id)
    {
        $sql = "SELECT a.id,a.name,categories.category,a.price,a.quantity,a.create_date,a.description
FROM `products` AS a
INNER JOIN categories
ON a.category = categories.id
WHERE a.id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `products` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }
}