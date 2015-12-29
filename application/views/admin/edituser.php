<form class="form-horizontal" role="form">
    <?foreach ($user as $user): ?>
    <div class="form-group">
        <label for="active" class="col-sm-2 control-label">Активность</label>
        <div class="col-md-6" style="padding-top: 7px">
            <input name="active" type="checkbox"
                <?if($user['is_activated']) {echo 'checked';}?>
                >
        </div>
    </div>
    <div class="form-group">
        <label for="Name" class="col-sm-2 control-label">Имя</label>
        <div class="col-md-6">
            <?echo "<input type='text' class='form-control' name='Name' id='Name' value = ".$user['name'].">";?>
        </div>
    </div>
    <div class="form-group">
        <label for="lastName" class="col-sm-2 control-label">Фамилия</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="lastName" id="lastName" value="<? echo $user['lastname']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="inputEmail3" id="inputEmail3" value="<? echo $user['email']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="group" class="col-sm-2 control-label">Группа</label>
        <div class="col-md-6">
            <p class="form-control-static">Пользователь в группе: <? echo $user['users_group']?></p>
            <select class="form-control" class="form-control" name="group" id="group">
                <option>Пользователь</option>
                <option>Аминистратор</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="dateReg" class="col-sm-2 control-label">Дата регистрации</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="dateReg" id="dateReg" value="<? echo $user['date_reg']?>" >
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Изменить данные</button>
        </div>
    </div>
    <?php endforeach ?>
</form>


