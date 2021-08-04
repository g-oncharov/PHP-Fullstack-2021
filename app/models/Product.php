<?php
namespace Model;

use Core\ActiveRecord;

class Product extends ActiveRecord {
    public $id;
    public $products;
    public $product;

    const SELECT_STMT = "SELECT * FROM Products";

    const FIND_BY_ID_STMT = "SELECT * FROM Products WHERE id = :id";
    const FIND_BY_CATEGORY_STMT = "SELECT Products.id as id, Products.title, description, price, category_id, image 
                                   FROM Products INNER JOIN Categories ON category_id = Categories.id 
                                   WHERE Categories.title = :title";

    public function get() {
        $stmt = self::$db->prepare(self::SELECT_STMT);
        $stmt->execute();
        $this->products = $stmt->fetchAll();
        return $this->products;
    }

    public function findById(int $id) {
        $stmt = self::$db->prepare(self::FIND_BY_ID_STMT);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $this->product = $stmt->fetch();
        return $this->product;
    }

    public function findByCategory(string $title) {
        $stmt = self::$db->prepare(self::FIND_BY_CATEGORY_STMT);
        $stmt->bindParam(':title', $title);
        $stmt->execute();
        $this->products = $stmt->fetchAll();
        return $this->products;
    }
}