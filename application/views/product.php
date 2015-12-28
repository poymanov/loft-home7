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
                        <a href="#" class="category_show_full">
                            <div class="category_full_wrap">
                                <img src="<?php echo $pathCommon.$image;?>" alt=""/>
                            </div>
                            <div class="category_full_mask"></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="item_right">
                <div class="item_options">
                    <ul class="item_counts">
                        <li>
                            <div class="item_counts_price">
                                цена за 1 штуку: <span class="cart_counter"><?php echo $price;?></span> руб.
                            </div>
                        </li>
                        <li>
                            <div class="item_counts_code">
                                Код товара: <strong><?php echo $sku;?></strong>
                            </div>
                            <div class="item_counts_code">
                                Производитель: <strong><?php echo $manufacturer;?></strong>
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
                            <div class="item_prop_title">Описание</div>
                            <ul class="item_prop_options"><?php echo $description;?></ul>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
</div>