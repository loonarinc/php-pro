<?php


namespace app\models\repositories;

use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{
    public function getOrder()
    {
        $sql = "SELECT * FROM orders WHERE session_id = :session";
        return $this->db->queryAll($sql, ['session' => session_id()]);
    }
    public function getTableName()
    {
        return 'orders';
    }

    public function getEntityClass()
    {
        return Order::class;
    }
}