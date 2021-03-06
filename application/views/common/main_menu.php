<!-- Основное меню -->

<!-- Определяем класс для отображения главного меню -->

<?php
	if (isset($nav_class)) {
		$menu_class = $nav_class;
	} else {
		$menu_class = "nav_main";
	}
?>

<section class="<?php echo $menu_class;?>">
	<nav>
		<!-- Навигация -->
		<?php if($main_menu) {?>
			<ul>
				<?php foreach ($main_menu as $menu_item) { ?>
					<li>
						<a href="/information/<?php echo $menu_item['name']?>" class="nav_link_wrap">
							<div class="nav_link_triangle">
								<div class="nav_link_outer">
									<div class="nav_link_inner">
										<span><?php echo $menu_item['h1']?></span>
									</div>
								</div>
							</div>
						</a>
					</li>
				<?php } ?>
				<!-- Кнопки регистрации, входа, выхода и корзины-->
				<!-- Корзина -->
				<li>
					<a href="/cart/" class="nav_link_wrap">
						<div class="nav_link_triangle">
							<div class="nav_link_outer">
								<div class="nav_link_inner">
									<span class="main-menu__cart">Корзина (<?php echo $this->cart->total_items();?>)</span>
								</div>
							</div>
						</div>
					</a>
				</li>
				<!-- Если пользователь авторизован, показываем только кнопку выхода -->
				<?php if($user_id) { ?>
					<li>
						<a href="/logout/" class="nav_link_wrap">
							<div class="nav_link_triangle">
								<div class="nav_link_outer">
									<div class="nav_link_inner">
										<span>Выход</span>
									</div>
								</div>
							</div>
						</a>
					</li>
				<?php } else {?>
					<li>
						<a href="/login/" class="nav_link_wrap">
							<div class="nav_link_triangle">
								<div class="nav_link_outer">
									<div class="nav_link_inner">
										<span>Вход</span>
									</div>
								</div>
							</div>
						</a>
					</li>
					<li>
						<a href="/reg/" class="nav_link_wrap">
							<div class="nav_link_triangle">
								<div class="nav_link_outer">
									<div class="nav_link_inner">
										<span>Регистрация</span>
									</div>
								</div>
							</div>
						</a>
					</li>
				<?php } ?>
			</ul>
		<?php } ?>
		<!-- Поиск -->
		<!-- <div class="search">
			<form action="">
				<div class="search_input_wrap">
					<div class="input_text">
						<div class="input_text_wrap">
							<input type="text" placeholder="Поиск по каталогу">
						</div>
					</div>
					<input class="search_ico" value="" type="submit">
				</div>
				<input class="search_submit" type="submit" value="">
			</form>
		</div> -->
	</nav>
</section>