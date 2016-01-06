<div style="padding-bottom: 50px">
    <p>В этом разделе вы можете:</p>
    <ul>
        <li>Просмотреть список всех категорий каталога</li>
        <li>Добавить, редактировать, удалять категорий каталога</li>
    </ul>
</div>
<table class="table table-striped table-bordered table-hover table-condensed">
    <thead>
    <tr class="info">
        <th>Название</th>
        <th></th>
        <th></th>

    </tr>
        <?php if ($categories) {
            foreach ($categories as $category) {
                $childrens1 = $category['childrens'];
                    if($childrens1) {?>
                    <tr>
                <?php } else { ?>
                    <tr>
                <?php } ?>
                <!-- Главные категории -->
                    <tr>
                        <td><a href="/catalog/<?php echo $category['href'];?>">
                            <span><?php echo $category['title'];?></span>
                        </a></td>
                        <td><a href="">Редактировать</a></td>
                        <td><a href="">Удалить</a></td>
                    </tr>
                    <?php if($category['childrens']) {?>
                <!-- Подкатегории -->
                            <?php foreach ($childrens1 as $category2) { ?>
                                <?php $childrens2 = $category2['childrens']; ?>
                                <?php if($childrens2) {?>
                                    <tr>
                                <?php } else { ?>
                                    <tr>
                                <?php } ?>
                                <td>
                                    <a class="categories_inner_title" href="/catalog/<?php echo $category2['href'];?>">
                                        <span><?php echo '&nbsp;&nbsp;└ '.$category2['title'];?></span>
                                    </a>
                                </td>
                                <td><a href="">Редактировать</a></td>
                                <td><a href="">Удалить</a></td>
                <!-- Подкатегории 2 -->
                        <?php if($childrens2) {?>
                                                <?php foreach ($childrens2 as $category3) { ?>
                                                    <tr>
                                                        <td>
                                                            <a class="categories_inner_title" href="/catalog/<?php echo $category3['href'];?>">
                                                                <span><?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;└ '.$category3['title'];?></span>
                                                            </a>
                                                        </td>
                                                        <td><a href="">Редактировать</a></td>
                                                        <td><a href="">Удалить</a></td>

                                                    </ек>
                                                <?php }?>
                                            </ul>
                                        </div>
                                        <a class="categories_popup_close" href="#"></a>
                                    </div>
                                <?php }?>
                                </li>
                            <?php }?>
                    <?php }?>
                </li>
            <?php }?>
        <?php }?>
    </table>


