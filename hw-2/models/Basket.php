<?php

namespace app\models;

class Basket extends Model
{
    public $id;
    public $good_id;
    public $price;
    public $quantity;
    public $session_id;

    public function getTableName()
    {
        return 'Basket';
    }
}