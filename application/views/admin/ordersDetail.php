<form action ="" method ="POST" class="form-horizontal" role="form">
    <?foreach ($orders as $order): ?>
<!--        Дата заказа-->
        <div class="form-group">
            <label for="dateReg" class="col-sm-2 control-label">Дата заказа</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="dateReg" id="dateReg" value="<? echo $order['date_reg']?>" disabled>
            </div>
        </div>
<!--        Дата изменения заказа-->
        <div class="form-group">
            <label for="date_update" class="col-sm-2 control-label">Дата изменения заказа</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="date_update" id="date_update" value="<? echo $order['date_reg']?>" disabled>
            </div>
        </div>
<!--        Пользователь-->
        <div class="form-group">
            <label for="Name" class="col-sm-2 control-label">Пользователь</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" id="Name" value = "<? echo $order['name'].' '.$order['lastname']?>" disabled>
            </div>
        </div>
<!--        Статус заказа-->
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Статус заказа</label>
            <div class="col-md-6">
                <select class="form-control" name="status" id="status">
                    <?foreach ($allSatus as $status):
                        if ($order['status']==$status['name']) {
                            echo "<option value='$status[id]' selected>".$status['name']."</option>";
                        }
                        else {
                            echo "<option value='$status[id]'>".$status['name']."</option>";}
                     endforeach ?>

                </select>
            </div>
        </div>
<!--        Способ доставки-->
        <div class="form-group">
            <label for="delivery" class="col-sm-2 control-label">Способ доставки</label>
            <div class="col-md-6">
                <select class="form-control" name="delivery" id="delivery">
                    <?foreach ($allDelivery_methods as $delivery_methods):
                        if ($order['delivery']==$delivery_methods['name']) {
                            echo "<option value='$delivery_methods[id]' selected>".$delivery_methods['name']."</option>";
                        }
                        else {
                            echo "<option value='$delivery_methods[id]'>".$delivery_methods['name']."</option>";}
                    endforeach ?>
                </select>
            </div>
        </div>
<!--        Способ оплаты-->
        <div class="form-group">
            <label for="payments" class="col-sm-2 control-label">Способ оплаты</label>
            <div class="col-md-6">
                <select class="form-control" name="payments" id="payments">
                    <?foreach ($allPayments_methods as $payments_methods):
                        if ($order['payments']==$payments_methods['name']) {
                            echo "<option value='$payments_methods[id]' selected>".$payments_methods['name']."</option>";
                        }
                        else {
                            echo "<option value='$payments_methods[id]'>".$payments_methods['name']."</option>";}
                    endforeach ?>
                </select>
            </div>
        </div>
<!--            Кнопка-->
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-default">Изменить данные</button>
            </div>
        </div>
    <?php endforeach ?>
</form>

<!--Список товаров-->
<p class="lead">Состав заказа</p>
<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <tr class="info">
        <th>Товар</th>
        <th>Количество</th>
        <th>Цена</th>
    </tr>
    </thead>

<?foreach ($orders_content as $content): ?>
<tr>
    <td><?php echo $content['tovarName'] ?></td>
    <td><?php echo $content['count'] ?></td>
    <td><?php echo $content['price'] ?></td>
</tr>
<?php endforeach ?>
</table>



