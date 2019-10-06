<?php


namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\entities\Order;
use app\models\repositories\OrderRepository;
use app\models\repositories\BasketRepository;

class OrderController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('order', [
            'orders' => App::call()->orderRepository->getAll()]);
    }

    public function actionView()
    {
        $id = App::call()->request->getParams()['id'];
        $session_id = App::call()->orderRepository->getFieldWhere('session_id', 'id', $id);
        if ($id == 0) {
            throw new \Exception("Заказ не найден", 404);
        }
        echo $this->render('view', [
            'basket' => App::call()->basketRepository->getBasket($session_id['session_id']),
            'id' => $id,
            'customer' => (array)App::call()->orderRepository->getWhere('id', $id)
            ]);

    }

    public function actionAdd()
    {
        (new OrderRepository())->save(new Order(
            (new Request())->getParams()['name'],
            (new Request())->getParams()['phone'],
            (new Request())->getParams()['email'],
            session_id(),
            'active',
            date("Y-m-d H:m:s")));
        session_destroy();
        setcookie("PHPSESSID", "", time() - 3600, "/");
        header("Location: /");
    }
}