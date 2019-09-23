Каталог
<?var_dump($catalog);?>
<?foreach ($catalog as $good): ?>
<div>
    <a href="/?c=product&a=card&id=<?=$good["id"]?>">
    <b><?=$good['name']?></b><br></a>
    <b><?=$good['description']?></b><br>
    Цена: <?=$good['price']?><br>
    <button class="buy" data-id="<?=$good['id']?>">Купить</button><hr>
</div>
<? endforeach; ?>