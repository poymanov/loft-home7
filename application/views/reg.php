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

        <section class="feedback">
            <?php echo form_open('reg'); ?>
                <div class="feedback_form_field">
                    <div class="text_input">
                        <div class="text_input_wrap">
                            <input type="text" name="name" placeholder="Имя" 
                            class="feedback_input" size="25" value="<?php echo set_value('name'); ?>">
                        </div>
                       
                    </div>
                     <div class="msg-error">
                        <?php echo form_error('name'); ?>
                    </div>
                    <div class="feedback_require_star"></div>
                </div>
                <div class="feedback_form_field">
                    <div class="text_input">
                        <div class="text_input_wrap">
                            <input type="text" name="lastname" placeholder="Фамилия" 
                            class="feedback_input" size="25" value="<?php echo set_value('name'); ?>">
                        </div>
                    </div>
                     <div class="msg-error">
                        <?php echo form_error('lastname'); ?>
                    </div>
                    <div class="feedback_require_star"></div>
                </div>
                <div class="feedback_form_field">
                    <div class="text_input">
                        <div class="text_input_wrap">
                            <input type="text" name="tel" placeholder="Телефон" 
                            class="feedback_input" value="<?php echo set_value('tel'); ?>">
                        </div>
                    </div>
                </div>
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
                    <div class="feedback_require_star"></div>
                </div>
                <div class="feedback_form_field">
                    <div class="text_input">
                        <div class="text_input_wrap">
                            <input type="password" name="password1" placeholder="Пароль" 
                            class="feedback_input" size="25" value="<?php echo set_value('password1'); ?>">
                        </div>
                    </div>
                     <div class="msg-error">
                        <?php echo form_error('password1'); ?>
                    </div>
                    <div class="feedback_require_star"></div>
                </div>
                <div class="feedback_form_field">
                    <div class="text_input">
                        <div class="text_input_wrap">
                            <input type="password" name="password2" placeholder="Подтверждение пароля" 
                            class="feedback_input" size="25" value="<?php echo set_value('password2'); ?>">
                        </div>
                    </div>
                     <div class="msg-error">
                        <?php echo form_error('password2'); ?>
                    </div>
                    <div class="feedback_require_star"></div>
                </div>
                <div class="g-recaptcha" data-sitekey="6LcF2hMTAAAAAPNhInq4_7I_yOiC1iNNBWffNgHx"></div>
                <div class="msg-error">
                    <?php echo form_error('g-recaptcha-response'); ?>
                </div>
                <div class="feedback_submit_block">
                    <a href="#" class="feedback_submit_btn">Отправить</a>
                    <input type="submit">
                </div>
            </form>
      </section>
    </div>
</div>