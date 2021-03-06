<div class="content_area">
    <div class="content_area_right">
        <?php include 'common/categories.php';?>
        <!-- Форма с фильтрами отбора -->
        <div class="category-filters">
            <div class="categories_title">Фильтры</div>
            <form method="get">
                <?php if($subcategories) {?>
                    <div class="category-filters__wrapper">
                        <label class="category-filters__label">Подкатегории:</label>
                        <select name="subcategory">
                            <?php foreach ($subcategories as $subcategory) { ?>
                                <option value="<?php echo $subcategory['id'];?>">
                                    <?php echo $subcategory['title'];?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } ?>
                <?php if($manucturers) {?>
                    <div class="category-filters__wrapper">
                        <label class="category-filters__label">Производитель:</label>
                        <select name="manufacturer">
                            <?php foreach ($manucturers as $man) { ?>
                                <option value="<?php echo $man['id'];?>">
                                    <?php echo $man['name'];?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                <?php } ?>
                <div class="category-filters__wrapper">
                    <label class="category-filters__label">Цена:</label>
                        от <input type="text" name="price1" class="category-filters__price-input">
                        до <input type="text" name="price2" class="category-filters__price-input">
                </div>
                <input type="submit" class="feedback_submit_btn" value="Показать">
            </form>
        </div>
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
        <?php if($products) {?>
            <ul class="products">
                <?php foreach ($products as $product) { ?>
                    <li>
                        <a href="/product/<?php echo $product['name'];?>">
                            <div class="products_img">
                                <img src="<?php echo $pathCommon.$product['image'];?>" alt="">
                            </div>
                            <div class="products_title">
                                <span><?php echo $product['title'];?></span>
                            </div>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <section class="paginator">
                <?php echo $this->pagination->create_links();?>
            </section>
        <?php } else {?>
        <?php echo "В данной категории еще пока нет товаров";?>
        <?php } ?>
    </div>
</div>
<section class="second_nav nav_main">
    <nav>
        <ul>
            <li>
                <a href="#" class="nav_link_wrap">
                    <div class="nav_link_triangle">
                        <div class="nav_link_outer">
                            <div class="nav_link_inner">
                                <span>акции</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="nav_link_wrap">
                    <div class="nav_link_triangle">
                        <div class="nav_link_outer">
                            <div class="nav_link_inner">
                                <span>новинки сезона</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="nav_link_wrap">
                    <div class="nav_link_triangle">
                        <div class="nav_link_outer">
                            <div class="nav_link_inner">
                                <span>предлагаем</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#" class="nav_link_wrap">
                    <div class="nav_link_triangle">
                        <div class="nav_link_outer">
                            <div class="nav_link_inner">
                                <span>скоро в продаже</span>
                            </div>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </nav>
</section>