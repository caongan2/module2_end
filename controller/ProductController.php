<?php


namespace Controller;

use Model\Products;
use Model\ProductDB;
use Model\DBConection;

class ProductController
{
    public ProductDB $productDB;

    public function __construct()
    {
        $connection = new DBConection("mysql:host=localhost;dbname=Product_manager", "root", "123456@Abc");
        $this->productDB = new ProductDB($connection->connect());
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET')
        {
            include "view/add.php";

        } else {
            $errors = [];
            $fields = ['name', 'category', 'price', 'quantity', 'datecreated', 'description'];

            foreach ($fields as $field )
            {
                if (empty($_POST[$field])) {
                    $errors[$field] = "Không được để trống";
                }
            }

            if (empty($errors)) {
                $name = $_POST['name'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $quantity = $_POST['quantity'];
                $datecreated = $_POST['datecreated'];
                $description = $_POST['description'];
                $product = new Products($name, $category, $price, $quantity, $datecreated, $description);
                $this->productDB->create($product);
                header("Location: index.php");

            } else {
                include "view/add.php";
            }
        }
    }

    public function getAll()
    {
        $products = $this->productDB->getAll();
        include "view/list.php";
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->productDB->delete($id);
        header("Location: index.php?page=list");
    }
}