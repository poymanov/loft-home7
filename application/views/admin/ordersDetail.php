<form action ="" method ="POST" class="form-horizontal" role="form">
    <?foreach ($orders as $order): ?>

        <div class="form-group">
            <label for="dateReg" class="col-sm-2 control-label">Дата заказа</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="dateReg" id="dateReg" value="<? echo $order['date_reg']?>" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="date_update" class="col-sm-2 control-label">Дата изменения заказа</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="date_update" id="date_update" value="<? echo $order['date_reg']?>" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="Name" class="col-sm-2 control-label">Пользователь</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" id="Name" value = "<? echo $order['name'].' '.$order['lastname']?>" disabled>
            </div>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Статус заказа</label>
            <div class="col-md-6">
                <select class="form-control" name="status" id="status">
                    <option value="1"><?echo $order['status'];?></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="delivery" class="col-sm-2 control-label">Способ доставки</label>
            <div class="col-md-6">
                <select class="form-control" name="delivery" id="delivery">
                    <option value="1"><?echo $order['delivery'];?></option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="payments" class="col-sm-2 control-label">Способ оплаты</label>
            <div class="col-md-6">
                <select class="form-control" name="payments" id="payments">
                    <option value="1"><?echo $order['payments'];?></option>
                </select>
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit" class="btn btn-default">Изменить данные</button>
            </div>
        </div>
    <?php endforeach ?>
</form>
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



