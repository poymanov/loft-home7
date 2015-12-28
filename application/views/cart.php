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
        <!-- Таблица с товарами -->
        <table class="cart__table">
            <tr>
                <th class="cart__th">#</th>
                <th class="cart__th">Наименование</th>
                <th class="cart__th">Кол-во</th>
                <th class="cart__th">Цена</th>
                <th class="cart__th">Итого</th>
            </tr>
             <?php $i = 1; ?>
            
            <!-- Вывод всех товаров из корзины -->
            <?php foreach($this->cart->contents() as $items) {?>
                <tr>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                    <td class="cart__td"><?php echo $i;?></td>
                    <td class="cart__td"><a href="/product/<?php echo $items['alias']; ?>"><?php echo $items['name']; ?></a></td>
                    <td class="cart__td">
                        <?php echo form_input(array('name' => $i.'[qty]','id' => 'product'.$i ,'value' => $items['qty'], 'maxlength' => '3', 'size' => '5','class'=>'cart__input')); ?>
                        
                        <!-- Формируем кнопки для удаления / обновления строки с товарами -->
                        <a class="cart__remove" href="/cart/update/<?php echo $items['rowid']?>/0/">Удалить строку</a>
                        <!-- Скрипт для кнопки обновления -->
                        <a class="cart__update" href="<?php echo '/cart/update/'.$items['rowid']; ?>">Обновить</a>
                    </td>
                    <td class="cart__td"><?php echo $this->cart->format_number($items['price']); ?></td>
                    <td class="cart__td"><?php echo $this->cart->format_number($items['subtotal']); ?></td>
                </tr>
                <?php $i++; ?>
            <?php } ?>
        </table>
        <div class="cart__bottom clearfix">
            <div class="cart__controls">
                <a href="/cart/clear_cart">Очистить корзину</a>
            </div>
            <div class="cart__totals">
                <div class="cart__total">
                    <strong>Всего:</strong> <?php echo $this->cart->total_items(); ?> шт.
                </div>
                <div class="cart__total">
                    <strong>Итого:</strong> <?php echo $this->cart->total(); ?> руб.
                </div>
            </div>
        </div>
        
    </div>
</div>