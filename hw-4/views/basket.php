Корзина покупателя
<?foreach ($basket as $cartitem): ?>
    <div>
        <b><?=$cartitem['session_id']?></b><br>
        <b><?=$cartitem['goods_id']?></b><br>
        Количество: <?=$cartitem['quantity']?><br>
        <button class="remove" data-id="<?=$cartitem['id']?>">Удалить</button><hr>
    </div>
<? endforeach; ?>