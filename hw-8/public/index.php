<?
//Что можно еще улучшить

//TODO 1 Добавить в корзину кнопочку "оформить заказ", которая либо перенаправит на страницу оформления заказа,
// либо прямо в корзине дорисуйте дополнительные поля для ввода имени, или телефона, почты пользователя,
// и по нажатию оформить заказ, в базе данных orders должна создаться одна запись вида например (session, email),
// по этой записи по сессии можно будет получить корзину пользователя email.
//TODO 2 Для администратора сделайте страницу админка, где выведите список заказов, т.е. таблицу orders.
// Саму сессию выводить не нужно, достаточно просто вывести номер, слово Заказ и email, по нажатию на который
// уже на отдельной странице можно увидеть детали заказа (отдельный запрос по сессии на корзину этого пользователя).
//TODO 3 Добавьте статусы для таблицы orders, вида заказ оформлен, в работе, оплачен, обработан и т.п.
// Сделайте функционал админу для изменения этих статусов.

//TODO 1* сделать оптимальным UPDATE
//TODO 2* сделать авторизацию по Hash и зашифровать пароль в БД
session_start();

use app\engine\App;

//include $_SERVER['DOCUMENT_ROOT'] . "/../engine/Autoload.php";
//spl_autoload_register([new Autoload(), 'loadClass']);

require_once '../vendor/autoload.php';
$config = include __DIR__ . "/../config/config.php";


try {
    App::call()->run($config);
} catch (Exception $e) {
    var_dump($e);
}



/**
 * @var Product $product
 */

//$product = new Product("Сникерс", "Вкусный", 12);
//$product->save();
//$product->delete();

//$product = Product::getCountWhere("sessioin_id",session_id());
//$product->setName("Сникерс2");
//$product->save();
//var_dump(($product));
//var_dump(get_class_methods($product));

