<?php


namespace Model;


class Products
{
    public string $name;
    public string $category;
    public int $price;
    public int $quantity;
    public mixed $datecreated;
    public string $description;
    public int $id;

    public function __construct(
        string $name,
        string $category,
        int $price,
        int $quantity,
        mixed $datecreated,
        string $description
    )
    {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->datecreated = $datecreated;
        $this->description = $description;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


}