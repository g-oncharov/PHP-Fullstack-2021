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

    /** @return string */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /** @return string */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /** @return int */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /** @return string */
    public function getCategory(): ?string
    {
        return $this->category;
    }

    /** @return int */
    public function getCategoryId(): ?int
    {
        return $this->categoryId;
    }

    /** @return string */
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
        $sql = 'SELECT products.id as id, products.title as title, description, 
                price, categories.title as category, categories.id as category_id, 
                image FROM products INNER JOIN categories ON products.category_id = categories.id 
                WHERE products.id=:id;';
        $entities = self::$db->query(
            $sql,
            Product::class,
            [':id' => $id]
        );
        return $entities ? $entities[0] : null;
    }

    /** @return Product[] */
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

    /** @return Product[] */
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

    /**
     * @param string $title
     * @param int $itemsPerPage
     * @return int
     */
    public static function getPagesCount(string $title, int $itemsPerPage = 8): int
    {
        $sql = 'SELECT COUNT(products.id) as count
                FROM products INNER JOIN categories 
                ON products.category_id = categories.id
                WHERE categories.title = :title;';
        $result = self::$db->query(
            $sql,
            Product::class,
            [':title' => $title]
        );
        return ceil($result[0]->count / $itemsPerPage);
    }

    /**
     * @param string $title
     * @param int $pageNum
     * @param int $itemsPerPage
     * @return array
     */
    public static function getPage(string $title, int $pageNum, int $itemsPerPage = 8): array
    {

        $offset = ($pageNum - 1) * $itemsPerPage;
        $sql = "SELECT products.id as id, products.title as title, 
                description, price, categories.title as category, image
                FROM products INNER JOIN categories ON products.category_id = categories.id
                WHERE categories.title = :title ORDER BY products.id DESC LIMIT $itemsPerPage OFFSET $offset;";
        return self::$db->query(
            $sql,
            Product::class,
            [':title' => $title]
        );
    }

    /**
     * @param string $title
     * @param string $description
     * @param int $price
     * @param int $category_id
     * @param string $image
     */
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

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param int $price
     * @param int $category_id
     * @param string $image
     */
    public static function update(
        int $id,
        string $title,
        string $description,
        int $price,
        int $category_id,
        string $image
    ): void {
        $sql = 'UPDATE products SET title = :title, description = :description, price = :price, 
                                    category_id = :category_id, image = :image WHERE id = :id;';

        self::$db->query(
            $sql,
            Product::class,
            [
                ':id' => $id,
                ':title' => $title,
                ':description' => $description,
                ':price' => $price,
                ':category_id' => $category_id,
                ':image' => $image,
            ]
        );
    }


    /** @param int $id */
    public static function delete(int $id): void
    {
        $sql = 'DELETE FROM products WHERE id = :id';

        self::$db->query(
            $sql,
            Product::class,
            [':id' => $id]
        );
    }

    /** @return string */
    protected static function getTableName(): string
    {
        return 'products';
    }
}
