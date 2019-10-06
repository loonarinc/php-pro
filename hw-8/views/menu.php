<? use app\engine\App; ?>
<a href="/"> Главная </a>
<a href="/product/catalog/"> Каталог </a>
<a href="/basket/"> Корзина <span id="count"><?=$count?></span></a>
<? if (App::call()->userRepository->isAuth()): ?>
<a href="/order/"> Админка </a>
<? endif ?>