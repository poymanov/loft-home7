<form action ="" method ="POST" class="form-horizontal" role="form">
    <!-- Название категории -->
    <div class="form-group">
        <label for="title" class="col-sm-2 control-label">Название</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="title" id="title" >
        </div>
    </div>
    <!-- Родительская категория -->
    <div class="form-group">
        <label for="parent_id" class="col-sm-2 control-label">Родительская категория</label>
        <div class="col-md-6">
            <select class="form-control" name="parent_id" id="parent_id">
                <option value='' selected>НЕТ</option>
                <?foreach ($allcategories as $one_category):
                    if ($one_category['id']==$category['parent_id']) {
                        echo "<option value='$one_category[id]' selected>".$one_category['title']."</option>";
                    }

                    else {
                        echo "<option value='$one_category[id]'>".$one_category['title']."</option>";}
                endforeach ?>
            </select>
        </div>
    </div>
    <!-- URL -->
    <div class="form-group">
        <label for="name" class="col-sm-2 control-label">URL</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="name" id="name" >
        </div>
    </div>
    <!-- meta_keywords -->
    <div class="form-group">
        <label for="meta_keywords" class="col-sm-2 control-label">KEYWORDS</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="meta_keywords" id="meta_keywords">
        </div>
    </div>
    <!-- meta_description -->
    <div class="form-group">
        <label for="meta_description" class="col-sm-2 control-label">DESCRIPTION</label>
        <div class="col-md-6">
            <input type="text" class="form-control" name="meta_description" id="meta_description">
        </div>
    </div>

    <!-- Кнопка -->
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit" class="btn btn-default">Добавить новую категрию</button>
        </div>
    </div>
</form>




