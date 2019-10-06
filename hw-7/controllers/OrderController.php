<?php


namespace app\controllers;


use app\engine\Request;
use app\models\entities\Order;
use app\models\repositories\OrderRepository;

class OrderController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('order', [
            'orders' => (new OrderRepository())->getOrder()]);
    }

    public function actionAdd()
    {
        (new OrderRepository())->save(new Order(
            (new Request())->getParams()['name'],
            (new Request())->getParams()['phone'],
            (new Request())->getParams()['adres'],
            session_id(),
            'active',
            date("Y-m-d H:m:s")));
        $response = [
            'result' => 1,
            'count' => (new BasketRepository())->getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}