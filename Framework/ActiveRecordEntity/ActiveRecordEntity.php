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

    public static Db $db;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    public function __construct()
    {
        self::$db = new Db();
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
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }


    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    /**
     * @return static[]
     */
    public static function findAll(): ?array
    {
        $sql = 'SELECT * FROM `' . static::getTableName() . '` ORDER BY id DESC;';
        return self::$db->query($sql, [], static::class);
    }

    abstract protected static function getTableName(): string;
}
