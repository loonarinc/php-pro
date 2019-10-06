<?php

namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\entities\Basket;
use app\models\entities\Product;
use app\models\repositories\ProductRepository;

class ProductController extends Controller
{
    public function actionIndex() {
        echo $this->render('index');
    }
    public function actionCatalog() {
        echo $this->render('catalog', ['catalog' => App::call()->productRepository->getAll()]);
    }
    public function actionCard() {
        $id = App::call()->request->getParams()['id'];
        if ($id == 0) {
            throw new \Exception("Продукт не найден", 404);
        }

        $product = App::call()->productRepository->getOne($id);
        echo $this->render('card', ['product' => $product]);
    }
}