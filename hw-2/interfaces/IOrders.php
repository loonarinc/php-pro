<?php

namespace app\interfaces;

interface IOrders
{
    public function getTableName();
    public function getOrder($id);
    public function removeOrder($id);
    public function completeOrder($id);
    public function updateOrder($id);


}