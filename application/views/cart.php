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
        <!-- Одностраничное оформление заказа с помощью табов -->
        <ul class="tabs__list">
            <li class="tabs__item tabs__item-active">
                <a class="h1 tabs__link" href="#tab_one"><?php echo $h1;?></a>
            </li>
            <li class="tabs__item"><span class="h1">&nbsp/&nbsp</span></li>
            <!-- Если в корзине нет товаров, то не нужно давать возможность оформления заказа -->
            <?php if($this->cart->total_items() > 0) {?>
                <li class="tabs__item">
                    <a class="h1 tabs__link" href="#tab_two">Оформление заказа</a>
                </li>
            <?php }?>
        </ul>
        <ul class="tabs-content__list">
            <li class="tabs-content__item" id="tab_one">
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
            </li>
            <li class="tabs-content__item" id="tab_two">
                <!-- Если пользователь не авторизован, 
                предлагаем ему авторизоваться или зарегистрироваться -->
                <?php if(!$user_id) {?>
                    <p>Оформление заказа доступно только зарегистрированным пользователям.</p>
                    <p><a href="/login">Авторизуйтесь</a> или <a href="/reg">зарегистрируйтесь</a> для оформления заказа</p>
                <?php } else { ?>
                    <form action="/cart/checkout" method="post" class="checkout__form">
                        <div class="checkout clearfix">
                            <div class="delivery">
                                <div class="checkout__header">Выбор способа доставки:</div>
                                <ul class="delivery_methods__list">
                                    <?php foreach ($delivery as $delivery_method) {?>
                                        <li class="delivery_methods__item">
                                            <label>
                                                <input type="radio" name="delivery" value="<?php echo $delivery_method['id'];?>"> <?php echo $delivery_method['name'];?>
                                            </label>
                                        </li>
                                    <? } ?>
                                </ul>
                            </div>
                            <div class="payments">
                                <div class="checkout__header">Выбор способа оплаты:</div>
                                <ul class="payments_methods__list">
                                    <?php foreach ($payments as $payments_method) {?>
                                        <li class="payments_methods__item">
                                            <label>
                                                <input type="radio" name="payments" value="<?php echo $payments_method['id'];?>"> <?php echo $payments_method['name'];?>
                                            </label>
                                        </li>
                                    <? } ?>
                                </ul>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $user_id?>">
                        <input type="submit" class="feedback_submit_btn" value="Оформить заказ">
                    </form>
                <? } ?>
            </li>
        </ul>

        
    </div>
</div>