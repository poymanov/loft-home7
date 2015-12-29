<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="<? echo $pathCommon;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<? echo $pathCommon;?>/css/admin.css" rel="stylesheet">
</head>
<body style="padding-top:70px">
    <!-- Меню -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/admin/">Панель управления сайтом loft-home7.local</a>
            </div>
            <!--Кнопка меню-->
            <button type="button" class="btn btn-danger btn-sm navbar-btn pull-right">Выйти</button>

        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <!--Пункты меню-->
                <ul class="nav nav-sidebar">
                    <li><a href="/admin/users">Пользователи</a></li>
                    <li><a href="">Заказы</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="">Категории каталога</a></li>
                    <li><a href="">Товары</a></li>
                </ul>
                <ul class="nav nav-sidebar">
                    <li><a href="">Выгрузка товаров</a></li>
                    <li><a href="">Рассылки</a></li>
                </ul>

            </div>
            <div class="col-md-9 col-md-offset-2">
                <!-- Заголовок страницы -->
                <div class="page-header">
                    <h3 > <?php echo $title;?></h3>
                </div>








