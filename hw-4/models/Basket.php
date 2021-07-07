<?php


namespace app\models;


class Basket extends DbModel
{
    public $id;
    public $session_id;
    public $product_id;
    public $quantity;
    public function __construct($session_id = null, $product_id = null, $quantity = null)
    {
        $this->session_id = $session_id;
        $this->product_id = $product_id;
        $this->quantity = $quantity;
    }
    public static function getTableName() {
        return 'basket';
    }
}