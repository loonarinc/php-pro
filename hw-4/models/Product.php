<?php

namespace app\models;

class Product extends DbModel
{
    private $id;
    private $name;
    private $description;
    private $price;

    /**
     * @param null $name
     */

    //TODO Вариант как сделать "умный" update, переделать под __set чтобы небыло дублирования (опционально)

    public function __set($name, $value)
    {
        $this->$name = $value;
        $this->state[$name] = true;
        var_dump($this);
    }

    public function __get($name)
    {
        return $this->$name;
    }

//    public function setName($name): void
//    {
//        $this->name = $name;
//        $this->state['name'] = true;
//    }
//
//    /**
//     * @param null $description
//     */
//    public function setDescription($description): void
//    {
//        $this->description = $description;
//    }
//
//    /**
//     * @param null $price
//     */
//    public function setPrice($price): void
//    {
//        $this->price = $price;
//    }

    public $state = [
        'name' => false,
        'description' => false,
        'price' => false,
    ];
    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $price
     */
    public function __construct($name = null, $description = null, $price = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }


    public static function getTableName()
    {
        return 'products';
    }




}