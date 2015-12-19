<div class="content_area">
    <div class="content_area_right">
        <!-- Категории -->
        <?php include 'common/categories.php';?>
        <section class="features_sale">
            <div class="feautures_green_back"></div>
            <div class="feautures_sale_product">
                <img src="<?php echo $pathCommon;?>/img/content/holy_meat_destroyer.png" alt="">
            </div>
            <div class="feautures_sale_mask"></div>
            <div class="feautures_sale_descript">
                <a href="#">Сезонная распродажа техники для кухни</a>
            </div>
            <div class="feautures_sale_stripe"></div>
        </section>
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
    </div>
</div>