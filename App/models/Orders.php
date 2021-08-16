<?php

namespace Model;

use Framework\ActiveRecordEntity\ActiveRecordEntity;

class Orders extends ActiveRecordEntity
{
    /** @var ?int */
    protected ?int $idProduct;

    /** @var ?int */
    protected ?int $idUser;

    /**
     * @return int|null
     */
    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    /**
     * @return int|null
     */
    public function getIdUser(): ?int
    {
        return $this->idUser;
    }


    /**
     * @return Orders[]
     */
    public static function findByUser(int $idUser): ?array
    {
        $sql = 'SELECT * FROM orders WHERE id_user = :idUser ORDER BY id DESC';

        return self::$db->query(
            $sql,
            Orders::class,
            [':idUser' => $idUser]
        );
    }


    protected static function getTableName(): string
    {
        return 'orders';
    }
}