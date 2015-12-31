<form action ="" method ="POST" class="form-horizontal" role="form">
    <?foreach ($user as $user): ?>
    <div class="form-group">
        <label for="is_activated" class="col-sm-2 control-label">Активен</label>
        <div class="col-md-6">
            <select class="form-control" name="is_activated" id="is_activated">
                <option value='1' <?if($user['is_activated']==1){echo 'selected';}?> >Да</option>
                <option value='0' <?if($user['is_activated']==0){echo 'selected';}?> >Нет</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="dateReg" class="col-sm-2 control-label">Дата регистрации</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="dateReg" id="dateReg" value="<? echo $user['date_reg']?>" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="Name" class="col-sm-2 control-label">Имя</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" id="Name" value = "<?echo $user['name']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="lastName" class="col-sm-2 control-label">Фамилия</label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="lastname" id="lastName" value="<? echo $user['lastname']?>">
            </div>
    </div>
    <div class="form-group">
        <label for="tel" class="col-sm-2 control-label">Телефон</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="tel" id="tel" value="<? echo $user['tel']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-md-6">
            <input type="email" class="form-control" name="email" id="email" value="<? echo $user['email']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="group" class="col-sm-2 control-label">Группа</label>
        <div class="col-md-6">
            <select class="form-control" name="users_group" id="users_group">
                <option value="2" <?if($user['users_group']==2){echo 'selected';}?> >Пользователь</option>
                    <option value="1" <?if($user['users_group']==1){echo 'selected';}?> >Аминистратор</option>
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


