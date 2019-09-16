<?php

namespace app\interfaces;

interface IBasket
{
    public function getTableName();
    public function getOne($id);
    public function removeItem($id);
    public function addItem($id);
    public function getBasket();

}