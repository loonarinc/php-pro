<?php


namespace app\models\repositories;

use app\engine\App;
use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{
    public function getOrder()
    {
        $sql = "SELECT * FROM orders WHERE session_id = :session";
        return App::call()->db->queryAll($sql, ['session' => session_id()]);
    }
    public function updateStatus($id, $status)
    {
        $sql = "UPDATE orders SET status = :status WHERE id = :id";
        return App::call()->db->execute($sql, ['id' => $id, 'status' => $status]);
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