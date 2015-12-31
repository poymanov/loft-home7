            <div style="padding-bottom: 50px">
                <p>В этом разделе вы можете:</p>
                <ul>
                    <li>Добавить права пользователям;</li>
                    <li>Активировать аккаунт пользователя;</li>
                    <li>Удалить пользователя.</li>
                </ul>
            </div>
            <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                <tr class="info">
                    <th>id</th>
                    <th>Данные пользователя</th>
                    <th>Группа</th>
                    <th>Дата регистрации</th>
                    <th>Активный</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <?php
                foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['id'] ?></td>
                        <td><?php echo 'Имя: '.$user['name'].' '.$user['lastname'].'<br/>Телефон: '.$user['tel']
                            .'<br/>Email: '.$user['email'] ?></td>
                        <td><?php echo $user['users_group'] ?></td>
                        <td><?php echo $user['date_reg'] ?></td>
                        <td>
                            <?php
                            if ($user['is_activated'] == 1) {
                                echo 'Да';
                            }
                            else {
                                echo "<span class='msg-error'>Нет</span>";
                            }

                            ?>
                        </td>
                        <td><a href="/admin/users/edituser/?id=<?php echo $user['id']?>">Редактировать</a></td>
                        <td>
                            <?if($user['users_group']==2){echo "<a href='/admin/users/?action=deluser&id=".$user['id']."'>Удалить</a>";}?>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>


