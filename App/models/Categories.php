<?php

namespace Model;

use Framework\ActiveRecordEntity\ActiveRecordEntity;

class Categories extends ActiveRecordEntity
{
    /** @var string */
    protected string $title;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    protected static function getTableName(): string
    {
        return 'categories';
    }
}
