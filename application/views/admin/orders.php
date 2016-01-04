<div style="padding-bottom: 50px">
    <p>В этом разделе вы можете:</p>
    <ul>
        <li>Просмотреть список всех заказов</li>
        <li>Вывести состав заказа</li>
        <li>Изменить статус заказа, доставки, вид оплаты</li>
    </ul>
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <tr class="info">
        <th>№</th>
        <th>Дата заказа</th>
        <th>Пользователь</th>
        <th>Статус</th>
        <th>Способ доставки</th>
        <th>Вид оплаты</th>
        <th>Дата изменения</th>
        <th></th>
    </tr>
    </thead>

    <?php
    foreach ($orders as $order): ?>
        <tr>
            <td><?php echo $order['id'] ?></td>
            <td><?php echo $order['date_reg'] ?></td>
            <td><?php echo $order['name'].' '.$order['lastname']?></td>
            <td><?php echo $order['status'] ?></td>
            <td><?php echo $order['delivery'] ?></td>
            <td><?php echo $order['payments'] ?></td>
            <td><?php echo $order['date_update'] ?></td>
            <td><a href="/admin/orders/editorder/?id=<?php echo $order['id']?>">Состав заказа</a></td>
        </tr>
    <?php endforeach ?>
</table>


