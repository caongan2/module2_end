<?php


namespace Model;


class ProductDB
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function create(object $product)
    {
        $sql = "INSERT INTO Products(nameProduct, category, price, quantity, dateCreated, description) VALUES (?,?,?,?,?,?)";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $product->name);
        $stmt->bindParam(2, $product->category);
        $stmt->bindParam(3, $product->price);
        $stmt->bindParam(4, $product->quantity);
        $stmt->bindParam(5, $product->datecreated);
        $stmt->bindParam(6, $product->description);
        return $stmt->execute();
    }

    public function getAll()
    {
        $products = [];
        $sql = "SELECT * FROM Products";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        foreach ($result as $row) {
            $product = new Products($row['nameProduct'], $row['category'], (int)$row['price'], (int)$row['quantity'],$row['dateCreated'], $row['description']);
            $product->setId($row['id']);
            $products[] = $product;

            return $products;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `Products` WHERE `ID` = ?";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }
}