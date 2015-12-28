<div class="content_area">
    <div class="content_area_right">
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
        <section class="item">
            <div class="item_left">
                <div class="item_card_view">
                    <div class="category_list_show">
                        <a href="#fancy" class="category_show_full">
                            <div class="category_full_wrap">
                                <img src="<?php echo $pathCommon;?>/img/content/big_executor.png" alt=""/>
                            </div>
                            <div class="category_full_mask"></div>
                        </a>
                        <div class="category_show_mini">
                            <ul class="category_mini_list">
                                <li>
                                    <a class="category_mini_item" href="#">
                                        <div class="category_mini_wrap">
                                            <img src="<?php echo $pathCommon;?>/img/content/vegetable_exterminator.png" alt=""/>
                                        </div>
                                        <div class="category_mini_mask"></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="category_mini_item" href="#">
                                        <div class="category_mini_wrap">
                                            <img src="<?php echo $pathCommon;?>/img/content/vegetable_exterminator.png" alt=""/>
                                        </div>
                                        <div class="category_mini_mask"></div>
                                    </a>
                                </li>
                                <li>
                                    <a class="category_mini_item" href="#">
                                        <div class="category_mini_wrap">
                                            <img src="<?php echo $pathCommon;?>/img/content/vegetable_exterminator.png" alt=""/>
                                        </div>
                                        <div class="category_mini_mask"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="category_order_rating">
                    <div class="category_rating_title">На складе:</div>
                    <ul class="category_rating_count">
                        <li class="filled"></li>
                        <li class="filled"></li>
                        <li class="filled"></li>
                        <li class="filled"></li>
                        <li class="filled"></li>
                        <li class="filled"></li>
                        <li class="filled"></li>
                        <li class="filled"></li>
                    </ul>
                    <div class="category_rating_amount"></div>
                </div>
            </div>
            <div class="item_right">
                <div class="item_options">
                    <div class="item_colors">
                        <div class="item_colors_title">Цвет:</div>
                        <ul class="item_colors_list">
                            <li class="white ">
                                <a href="<?php echo $pathCommon;?>/img/content/vegetable_exterminator.png">
                                    <span></span>
                                </a>
                            </li>
                            <li class="black active">
                                <a href="<?php echo $pathCommon;?>/img/content/vegetable_exterminator.png">
                                    <span></span>
                                </a>
                            </li>
                            <li class="orange">
                                <a href="<?php echo $pathCommon;?>/img/content/vegetable_exterminator.png">
                                    <span></span>
                                </a>
                            </li>
                            <li class="grey">
                                <a href="<?php echo $pathCommon;?>/img/content/vegetable_exterminator.png">
                                    <span></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <ul class="item_counts">
                        <li>
                            <div class="item_counts_price">
                                цена за 1 штуку: <span class="cart_counter"><?php echo $price;?></span> руб.
                            </div>
                        </li>
                        <li>
                            <div class="item_counts_code">
                                Код товара: <span>440-076</span>
                            </div>
                        </li>
                        <li>
                            <div class="item_counts_amount">
                                Количество в упаковке: <span>6</span>
                            </div>
                        </li>
                    </ul>
                    <div class="category_buy_counter">
                        <form class="product_add_cart">
                            <div class="text_input">
                                <div class="text_input_wrap">
                                    <!-- Скрытые поля для данных о товаре -->
                                    <?php echo form_hidden('product_id', $product_id);?>
                                    <?php echo form_hidden('name', $h1);?>
                                    <?php echo form_hidden('price', $price);?>
                                    <?php echo form_hidden('alias', $alias);?>
                                    <?php 
                                    $data = array('name' => 'qty','type'=> 'text','value' => '1','class' => 'category_count_input');
                                        echo form_input($data);
                                    ?>
                                </div>
                            </div>

                            <a href="#" class="category_count_button">В корзину</a>
                            <input class="category_count_submit" type="submit"/>
                        </form>
                    </div>
                </div>
                <div class="item_properties">
                    <ul class="item_prop_list">
                        <li>
                            <div class="item_prop_title">Параметры</div>
                            <ul class="item_prop_options">
                                <li>
                                    <span class="item_option_title">Вес</span>
                                    <span class="item_options_content">5 кг</span>
                                </li>
                                <li>
                                    <span class="item_option_title">Габариты</span>
                                    <span class="item_options_content">120х30х150 мм</span>
                                </li>
                                <li>
                                    <span class="item_option_title">Рабочий объем колбы</span>
                                    <span class="item_options_content">12 л</span>
                                </li>
                                <li>
                                    <span class="item_option_title">Максимальная можность</span>
                                    <span class="item_options_content">400 Вт</span>
                                </li>
                                <li>
                                    <span class="item_option_title">Электропитание</span>
                                    <span class="item_options_content">220 В, 50 Гц</span>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="item_prop_title">Описание</div>
                            <ul class="item_prop_options">
                                <li>
                                    Колба-духовка из жаропрочного стекла
                                </li>
                                <li>
                                    Колба-духовка из жаропрочного стекла
                                </li>
                                <li>
                                    Автоматическое включение и отключение при опускании и поднятии крышки
                                </li>
                                <li>
                                    Электронная панель управления
                                </li>
                                <li>
                                    Колба-духовка из жаропрочного стекла
                                </li>
                                <li>
                                    Колба-духовка из жаропрочного стекла
                                </li>
                                <li>
                                    Колба-духовка из жаропрочного стекла
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="item_prop_title">Аксессуары</div>
                            <ul class="item_prop_options">
                                <li>
                                    Колба-духовка из жаропрочного стекла
                                </li>
                                <li>
                                    Колба-духовка из жаропрочного стекла
                                </li>
                                <li>
                                    Электронная панель управления
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>