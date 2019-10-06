<h2>Подробности заказа № <?= $id ?></h2>
<p>Имя клиента: <?= $customer['name'] ?></p>
<p>Номер телефона: <?= $customer['phone'] ?></p>
<p>E-mail: <?= $customer['email'] ?></p>
<p>Статус: <?= $customer['status'] ?></p>
<p>Дата оформления: <?= $customer['dt_start'] ?></p>

<table class="table">
    <tr>
        <th>ID товара</th>
        <th>Название</th>
        <th>Цена</th>
    </tr>
<? foreach ($basket as $item): ?>
<tr>
    <td><?= $item['id_prod'] ?></td>
    <td><?= $item['name'] ?></td>
    <td><?= $item['price'] ?></td>

</tr>
<? endforeach; ?>
</table>
