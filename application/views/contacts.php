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
        <section class="text"><?php echo $text;?></section>
        
        <div class="address_map">
            <div id="ymaps-map-id_136360048834677272460" style="width: 647px; height: 326px;"></div>
            <script type="text/javascript">function fid_136360048834677272460(ymaps) {var map = new ymaps.Map("ymaps-map-id_136360048834677272460", {center: [39.852977256591814, 47.28125410574537], zoom: 14, type: "yandex#map"});map.controls.add("zoomControl").add("mapTools").add(new ymaps.control.TypeSelector(["yandex#map", "yandex#satellite", "yandex#hybrid", "yandex#publicMap"]));};</script>
            <script type="text/javascript" src="http://api-maps.yandex.ru/2.0-stable/?lang=ru-RU&coordorder=longlat&load=package.full&wizard=constructor&onload=fid_136360048834677272460"></script>
            <div class="addres_lt"></div>
            <div class="addres_rt"></div>
            <div class="addres_lb"></div>
            <div class="addres_rb"></div>
            <div class="addres_left"></div>
            <div class="addres_right"></div>
            <div class="addres_top"></div>
            <div class="addres_bottom"></div>
      </div>

      <section class="feedback">
        <div class="contacts_title">Свяжитесь с нами</div>
        <!-- Если была отправка формы и она прошла успешно, то выводим соответствующее общение -->
        <?php if($form_status == 'success') {?>
            <div class="msg-success">Спасибо за обращение! Сообщение успешно отправлено!</div>
        <?php }?>
        <?php echo form_open('contacts'); ?>
            <div class="feedback_form_field">
                <div class="text_input">
                    <div class="text_input_wrap">
                        <input type="text" name="name" placeholder="ФИО" 
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
                        <input type="text" name="tel" placeholder="Телефон" 
                        class="feedback_input" value="<?php echo set_value('tel'); ?>">
                    </div>
                </div>
            </div>
            <div class="feedback_form_field">
                <div class="text_input">
                    <div class="text_input_wrap">
                        <input type="text" name="email" placeholder="E-MAIL" 
                        class="feedback_input"  value="<?php echo set_value('email'); ?>">
                    </div>
                </div>
                <div class="msg-error">
                    <?php echo form_error('email'); ?>
                </div>
                <div class="feedback_require_star"></div>
            </div>
            <div class="feedback_form_field">
                <textarea name="message" class="feedback_massage" 
                placeholder="Текст сообщения"><?php echo set_value('message'); ?></textarea>
                <div class="msg-error">
                    <?php echo form_error('message'); ?>
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