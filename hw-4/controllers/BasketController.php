<?php

namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionBasket() {
        //пока будем выводить всё что есть в таблице
        $basket = Basket::getAll();
        echo $this->render('basket', ['basket' => $basket]);
    }
}