<?php

namespace Model;

use Framework\ActiveRecordEntity\ActiveRecordEntity;

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
     * @return string
     */
    public function getPrice(): ?string
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getImage(): ?string
    {
        return $this->image;
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
            [':title' => $title],
            Product::class
        );
    }

    /**
     * @return Product[]
     */
    public static function findByCategory(string $title): ?array
    {
        $sql = 'SELECT products.id as id, products.title as title, description, price, category_id, image
                FROM products INNER JOIN categories ON category_id = categories.id
                WHERE categories.title = :title ORDER BY products.id DESC;';

        return self::$db->query(
            $sql,
            [':title' => $title],
            Product::class
        );
    }

    protected static function getTableName(): string
    {
        return 'products';
    }
}
