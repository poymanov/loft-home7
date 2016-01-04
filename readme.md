## Домашнее задание #7 учебной группы курса LoftSchool по PHP

Внимание!

1) Необходимо назвать папку проекта в OpenServer **loft-home7.local** (базовый URL проекта в config.php CodeIgniter)

2) Необходимо клонировать этот проект с GitHub в вышеуказанную папку, а затем из дистрибутива CodeIgniter подложить папку **system** корень. Её не нужно коммитить на github, т.к. работать будем только с **application**

3) Свежий дамп базы данных всегда лежит в **корне проекта**. На своем сервере таблицу с данными необходимо назвать - **loft-home7**, доступ через пользователя **root**

=========================================================
=========================================================

**Структура проекта:**

*/markup/* - Служебные элементы разметки (img, css, js)

=========================================================

**Контроллеры:**

*Main.php* - главная страница

*Catalog.php* - страница каталога

*Product.php* - карточка товара

*Information.php* - страница с текстовой информацией

*Contacs.php* - страница для отображения содержимого контактной страницы+
обработка отправки формы обратной связи

*Reg.php* - страница регистрации нового пользователя

*Activation.php* - страница активации пользователя

*Login.php* - страница авторизации пользователя

*Cart.php* - страница корзины и методы для работы с её содержимым

*admin/Main_admin.php* - главная страница панели управления

*admin/Users_admin.php* - страница вывода, редактирования и удаления пользователей

*admin/Orders_admin.php* - страница вывода списка заказов,изменения статуса заказа, измнения способа доставки и способа оплаты
=========================================================

**Представления:**

*/views/common* - общие элементы разметки для всех страниц

*index.php* - представление главной страницы

*catalog.php* - представление страницы каталога

*product.php* - представление карточки товара

*information.php* - представление текстовой информации

*contacts.php* - представление страницы контактной информации

*reg.php* - представление страницы регистрации пользователя. Форма и капча

*reg-success* - представление страницы успешной регистрации пользователя

*activation.php* - представление страницы состояния активации аккаунта пользователя

*login.php* - представление страницы авторизации пользователя

*logout.php* - представление страницы выхода пользователя

*cart.php* - представление страницы корзины пользователя

*/views/admin/common* - общие элементы разметки для страниц панели управления

*/admin/index.php* - представление главной страницы для панели управления

*/admin/users.php* - представление страницы со списком пользователей сайта

*/admin/edituser.php* - представление страницы с формой для редактирования данных пользователя

*/admin/massege.php* - представление страницы вывода сообщение об успешной операции

*/admin/orders.php* - представление страницы со списком всех заказов

*/admin/ordersDetail.php* - представление страницы со списком товаров в заказе и формой для редактирования заказов

=========================================================

**Модели:**

*Information_model.php* - получение конкретной страницы по имени

*Main-menu.php* - получение данных для основного меню

*Categories_model.php* - получение данных для вывода списка категорий в сайдбаре

*Product_model.php* - получение данных для вывода товаров

*Login_model.php* - получение данных для проверки авторизации пользователя

*Cart.php* - получение данных для корзины и оформления заказа

*MY_model.php* - основные функции для всех данных из таблицы, получение строки по id, удаление и вставка данных в БД

=========================================================
=========================================================

**Структура БД (таблицы):**

*information* - данные для текстовых страниц проекта (оплата, о нас, контакты)

*categories* - данные по категориям каталога

*products* - данные по товарам

*products_categories* - данные по связям продуктов и категорий.
Т.к. товар может быть в нескольких категориях

*users* - данные по зарегистрированным пользователям

*users_groups* - группы пользователей

*ci_sessions* - данные для хранения сессий

*delivery_methods* - список доступных способов доставки

*payments_methods* - список доступных способов оплаты

*orders* - список совершенных в магазине заказов

*orders_status* - список статусов для заказов

*orders_content* - список данных по составу заказов

*manufacturers* - список производителей для товаров

=========================================================
=========================================================