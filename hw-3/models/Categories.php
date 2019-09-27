<?php

namespace app\models;

class Categories extends Model
{
    public $id;
    public $name;
    public $description;
    public $status;

    public function getTableName()
    {
        return 'categories';
    }
}
