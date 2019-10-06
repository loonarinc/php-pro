<h2>Заказы</h2>
<table class="table">
    <tr>
        <th>ID</th>
        <th>Состав заказа</th>
        <th>Дата заказа</th>
        <th>Статус</th>
        <th>Смена статуса</th>
    </tr>
    <? foreach ($orders as $order): ?>
        <tr id="<?= $order['id'] ?>">
            <td><?= $order['id'] ?></td>
            <td><a href="/order/view/?id=<?= $order['id'] ?>">Заказ</a></td>
            <td><?= $order['dt_start'] ?></td>
            <td class="status" id="status-<?= $order['id'] ?>">
                <?php if ($order['status'] == "active"): ?>
                    В обработке
                <?php elseif ($order['status'] == "paid"): ?>
                    Оплачен
                <?php elseif ($order['status'] == "complete"): ?>
                    Выполнен
                <?php elseif ($order['status'] == "canceled"): ?>
                    Отменён
                <?php endif ?>
            </td>
            <td>
                <button data-id="<?= $order['id'] ?>" class="btn_paid">Оплачен</button>
                <button data-id="<?= $order['id'] ?>" class="btn_process">Завершён</button>
                <button data-id="<?= $order['id'] ?>" class="btn_cancel">Отменён</button>
                <button data-id="<?= $order['id'] ?>" class="btn_remove">Удалить</button>
            </td>
        </tr>
    <? endforeach; ?>
</table>

<script>
    let btn_process = document.querySelectorAll('.btn_process');
    btn_process.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/OrderComplete/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('status-'+id).innerText = "Завершён";
            })();
        })
    });
    let btn_paid = document.querySelectorAll('.btn_paid');
    btn_paid.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/OrderPaid/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('status-'+id).innerText =  "Оплачен";
            })();
        })
    });
    let btn_cancel = document.querySelectorAll('.btn_cancel');
    btn_cancel.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/OrderCancel/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById('status-'+id).innerText = "Отменён";
            })();
        })
    });
    let btn_rmv = document.querySelectorAll('.btn_remove');
    btn_rmv.forEach((elem) => {
        elem.addEventListener('click', () => {
            let id = elem.getAttribute('data-id');
            (async () => {
                const response = await fetch('/Api/OrderRemove/', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        id: id
                    }),
                });
                const answer = await response.json();
                document.getElementById(id).remove();
            })();
        })
    });

</script>