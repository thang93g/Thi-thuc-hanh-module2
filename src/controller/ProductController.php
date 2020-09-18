<?php
namespace Prd\controller;

use Prd\model\CategoryManager;
use Prd\model\Product;
use Prd\model\ProductManager;

class ProductController
{
    protected $productManager;
    protected $categoryManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
        $this->categoryManager = new CategoryManager();
    }

    public function getAll()
    {
        $products = $this->productManager->getAll();
        include_once "src/view/view.php";
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $categories = $this->categoryManager->getAll();
            include_once "src/view/add-product.php";
        } else {
            $name = $_REQUEST['name'];
            $category = $this->categoryManager->getIdByName($_REQUEST['category']);
            $price = $_REQUEST['price'];
            $quantity = $_REQUEST['quantity'];
            $description = $_REQUEST['description'] == ""?"No description":$_REQUEST['description'];
            $createDate = date("yy/m/d");
            $product = new Product($name,$category,$price,$quantity,$createDate,$description);
            $this->productManager->add($product);
            header("location:index.php");
        }
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $key = "%".$_REQUEST['search']."%";
            $products = $this->productManager->search($key);
            include_once "src/view/view.php";
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            $id = $_REQUEST['id'];
            $product = $this->productManager->getProductById($id);
            $categories = $this->categoryManager->getAll();
            include_once "src/view/edit.php";
        } else {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $category = $this->categoryManager->getIdByName($_REQUEST['category']);
            $price = $_REQUEST['price'];
            $quantity = $_REQUEST['quantity'];
            $description = $_REQUEST['description'] == ""?"No description":$_REQUEST['description'];
            $createDate = date("yy/m/d");
            $product = new Product($name,$category,$price,$quantity,$createDate,$description);
            $product->setId($id);
            $this->productManager->edit($product);
            header("location:index.php");
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->productManager->delete($id);
        header("location:index.php");
    }
}