<div style="padding-bottom: 50px">
    <p>В этом разделе вы можете:</p>
    <ul>
        <li>Просмотреть список всех категорий каталога</li>
        <li>Добавить, редактировать, удалять категорий каталога</li>
    </ul>
</div>
<p><a href="category_admin/newcategory" type="button" class="btn btn-success"> + Добавить новую категорию</a></p>
<table class="table table-striped table-bordered table-hover table-condensed">
    <tr class="info">
        <th>ID</th>
        <th>Название</th>
        <th>URL</th>
        <th></th>
        <th></th>

    </tr>
    <?foreach ($categorys as $category): ?>
        <tr>
            <td><?php echo $category['id']?></td>
            <td><?php echo '<strong>'.$category['title'].'</strong><br/><small>KEYWORDS: '.$category['meta_keywords'].'<br/> DESCRIPTION: '.$category['meta_description'].'</small>'  ?></td>
            <td><?php echo $category['name']?></td>
            <td><a href="/admin/category/editcategory/?id=<?php echo $category['id']?>">Редактировать</a></td>
            <td><a href="/admin/category/?action=delcategory&id=<?php echo $category['id']?>">Удалить</a></td>
        </tr>
    <?php endforeach ?>
</table>


