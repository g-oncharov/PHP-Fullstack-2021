<?php

namespace Model;

use Framework\ActiveRecordEntity\ActiveRecordEntity;

class Product extends ActiveRecordEntity
{
    /** @var string */
    protected string $title;

    /** @var string */
    protected string $description;

    /** @var int */
    protected int $price;

    /** @var string */
    protected string $image;

    /** @var ?string */
    protected ?string $category = null;

    /** @var ?int */
    protected ?int $categoryId = null;

    /**
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getCategory(): ?string
    {
        return $this->category;
    }


    /**
     * @return int
     */
    public function getCategoryId(): ?int
    {
        return $this->category;
    }
    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param int $id
     * @return static|null
     */
    public static function findById(int $id): ?self
    {
        $sql = 'SELECT products.id as id, products.title as title, description, price, categories.title as category, image
                FROM products INNER JOIN categories ON products.category_id = categories.id WHERE products.id=:id;';
        $entities = self::$db->query(
            $sql,
            Product::class,
            [':id' => $id]
        );
        return $entities ? $entities[0] : null;
    }

    /**
     * @return static|null
     */
    public static function findLastId(): ?self
    {
        $sql = 'SELECT max(id) as id FROM products';
        $entities = self::$db->query(
            $sql,
            Product::class
        );
        return $entities ? $entities[0] : null;
    }

    /**
     * @return Product[]
     */
    public static function findByTitle(string $title): ?array
    {
        $sql = 'SELECT * FROM products WHERE title LIKE :title ORDER BY id DESC;';
        $title = '%' . $title . '%';

        return self::$db->query(
            $sql,
            Product::class,
            [':title' => $title]
        );
    }

    /**
     * @return Product[]
     */
    public static function findByCategory(string $title): ?array
    {
        $sql = 'SELECT products.id as id, products.title as title, 
                description, price, categories.title as category, image
                FROM products INNER JOIN categories ON products.category_id = categories.id
                WHERE categories.title = :title ORDER BY products.id DESC;';

        return self::$db->query(
            $sql,
            Product::class,
            [':title' => $title]
        );
    }

    public static function insert(string $title, string $description, int $price, int $category_id, string $image): void
    {
        $sql = 'INSERT INTO products (title, description, price, category_id, image)
                VALUES (:title, :description, :price, :category_id, :image);';

        self::$db->query(
            $sql,
            Product::class,
            [
                ':title' => $title,
                ':description' => $description,
                ':price' => $price,
                ':category_id' => $category_id,
                ':image' => $image,
            ]
        );
    }


    public static function delete(int $id): void
    {
        $sql = 'DELETE FROM products WHERE id = :id';

        self::$db->query(
            $sql,
            Product::class,
            [':id' => $id]
        );
    }

    protected static function getTableName(): string
    {
        return 'products';
    }
}
