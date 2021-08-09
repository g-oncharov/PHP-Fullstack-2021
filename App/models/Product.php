<?php

namespace Model;

use Framework\Db\Db;
use Framework\ActiveRecordEntity\ActiveRecordEntity;
use PDO;

class Product extends ActiveRecordEntity
{
    /** @var string */
    private string $title;

    /** @var string */
    private string $description;

    /** @var string */
    private string $price;

    /** @var int */
    protected int $categoryId;

    /** @var string */
    private string $image;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return Product[]
     */
    public static function findByTitle(string $title): array
    {
        $db = new Db();
        $title = '%' . $title . '%';
        return $db->query("SELECT * FROM Products WHERE title LIKE :title ORDER BY id DESC;", [':title' => $title], Product::class);
    }

    /**
     * @return Product[]
     */
    public static function findByCategory(string $title): array
    {
        $db = new Db();
        return $db->query('SELECT Products.id as id, Products.title as title, description, price, category_id, image
                                   FROM Products INNER JOIN Categories ON category_id = Categories.id
                                   WHERE Categories.title = :title ORDER BY Products.id DESC;', [':title' => $title], Product::class);
    }

    protected static function getTableName(): string
    {
        return 'Products';
    }

}
