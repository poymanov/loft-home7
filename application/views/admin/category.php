<div style="padding-bottom: 50px">
    <p>В этом разделе вы можете:</p>
    <ul>
        <li>Просмотреть список всех категорий каталога</li>
        <li>Добавить, редактировать, удалять категорий каталога</li>
    </ul>
</div>

<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <tr class="info">
        <th>№</th>
        <th>Категория</th>
        <th>Url</th>
        <th></th>
        <th></th>
    </tr>
    </thead>

    <?php
    foreach ($categorys as $category): ?>
        <tr>
            <td><?php echo $category['id']?></td>
            <td><?php echo '<strong>'.$category['title'].'</strong><br/><small>KEYWORDS: '.$category['meta_keywords'].'<br/> DESCRIPTION: '.$category['meta_description'].'</small>'  ?></td>
            <td><?php echo $category['name']?></td>
            <td><a href="">Редактировать</a></td>
            <td><a href="">Удалить</a></td>
<!--            <td>--><?php //echo $order['status'] ?><!--</td>-->
<!--            <td>--><?php //echo $order['delivery'] ?><!--</td>-->
<!--            <td>--><?php //echo $order['payments'] ?><!--</td>-->
<!--            <td>--><?php //echo $order['date_update'] ?><!--</td>-->
<!--            <td><a href="/admin/orders/editorder/?id=--><?php //echo $order['id']?><!--">Состав заказа</a></td>-->
        </tr>
    <?php endforeach ?>
</table>