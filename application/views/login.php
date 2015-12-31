<div class="content_area">
    <div class="content_area_right">
        <!-- Категории -->
        <?php include 'common/categories.php';?>
        <?php include 'common/sale.php';?>
    </div>
    <div class="content_area_left">
        <?php if($breadcrumbs) {?>
            <section class="breadcrumbs">
                <ul>
                    <?php foreach ($breadcrumbs as $item) { ?>
                        <?php // Если ссылки нет, то считаем, что это последний элемент хлебных крошек
                            if(empty($item['href'])) { ?>
                            <li class="active"><?php echo $item['name']?></li>
                        <?php } else {?>
                            <li>
                                <a href="<?php echo $item['href']?>"><?php echo $item['name']?></a>
                            </li>
                        <?php } ?>
                    <? } ?>
                </ul>
            </section>
        <?php } ?>
        <section class="h1"><?php echo $h1;?></section>
        

        <?php 
        //если пользователь авторизован, показываем ему сообщение об успешной авторизации
        if(isset($user_id)) { ?>
            <p>Вы успешно авторизовались.</p>
        <?} else {?>
            <section class="feedback">
                <?php echo form_open('login'); ?>
                    <div class="feedback_form_field">
                        <div class="text_input">
                            <div class="text_input_wrap">
                                <input type="text" name="email" placeholder="E-mail" 
                                class="feedback_input"  value="<?php echo set_value('email'); ?>">
                            </div>
                        </div>
                        <div class="msg-error">
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>
                    <div class="feedback_form_field">
                        <div class="text_input">
                            <div class="text_input_wrap">
                                <input type="password" name="password" placeholder="Пароль" 
                                class="feedback_input" size="25" value="<?php echo set_value('password'); ?>">
                            </div>
                        </div>
                         <div class="msg-error">
                            <?php 
                                //Сообщение об ошибке после вторичной проверки пароля
                                if(isset($invalidPassword)) {
                                    echo "Указан неверный для пароль";
                                } else {
                                    echo form_error('password');
                                }
                            ?>
                        </div>
                    </div>
                    <div class="feedback_submit_block">
                        <a href="#" class="feedback_submit_btn">Войти</a>
                        <input name="submit" type="submit">
                    </div>
                </form>
            </section>
        <?php } ?>
    </div>
</div>