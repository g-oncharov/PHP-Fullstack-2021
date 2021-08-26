<?php

namespace Framework\ActiveRecordEntity;

use Framework\Db\Db;

abstract class ActiveRecordEntity
{
    /** @var int */
    protected int $id;

    /** @var string|null */
    protected ?string $createdAt = null;

    /** @var string|null */
    protected ?string $updatedAt = null;

    /** @var Db */
    public static Db $db;

    public function __construct()
    {
        self::$db = new Db();
    }

    /** @return int */
    public function getId(): int
    {
        return $this->id;
    }

    /** @return string */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /** @return string */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param int $id
     * @return static|null
     */
    public static function findById(int $id): ?self
    {
        $sql = 'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;';
        $entities = self::$db->query(
            $sql,
            static::class,
            [':id' => $id]
        );
        return $entities ? $entities[0] : null;
    }

    /** @return static|null */
    public static function findLastId(): ?self
    {
        $sql = 'SELECT max(id) as id FROM ' . static::getTableName();
        $entities = self::$db->query(
            $sql,
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    /**
     * Convert not specified properties for the CamelCase
     *
     * @param string $name
     * @param $value
     */
    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    /**
     * Convert To CamelCase
     *
     * @param string $source
     * @return string
     */
    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    /** @return static[] */
    public static function findAll(): ?array
    {
        $sql = 'SELECT * FROM `' . static::getTableName() . '` ORDER BY id DESC;';
        return self::$db->query($sql, static::class);
    }

    abstract protected static function getTableName(): string;
}
