<section class="categories accordeon">
    <div class="categories_title">Продукция</div>
    <ul class="categories_list accordeon_list">
    	<?php if ($categories) { ?>
    		<?php foreach ($categories as $category) { ?>
    			<?php $childrens1 = $category['childrens']; ?>
				<?php if($childrens1) {?>
		        <li>
				<?php } else { ?>
				<li>
				<?php } ?>
		            <div class="categories_list_item">
		                <div class="categories_item_title">
		                    <a class="categories_nonclickable" href="/category/<?php echo $category['href'];?>">
		                        <span><?php echo $category['title'];?></span>
		                    </a>
		                </div>
		                <?php if($category['childrens']) {?>
			                <ul class="categories_item_sublist accordeon_content">
			                	<?php foreach ($childrens1 as $category2) { ?>
									<?php $childrens2 = $category2['childrens']; ?>
									<?php if($childrens2) {?>
							        <li class="with_popup">
									<?php } else { ?>
									<li>
									<?php } ?>
										<div class="categories_sublist_inner">
				                            <a class="categories_inner_title" href="/category/<?php echo $category2['href'];?>">
				                                <span><?php echo $category2['title'];?></span>
				                            </a>
				                            <span class="categories_sublist_counter">14</span>
			                        	</div>
			                        	<?php if($childrens2) {?>
											<div class="categories_sublist_popup">
												<div class="categories_popup_inner">
													<ul class="categories_popup_list">
						                        		<?php foreach ($childrens2 as $category3) { ?>
															<li>
												                <div class="categories_sublist_inner">
												                    <a class="categories_inner_title" href="/category/<?php echo $category3['href'];?>">
												                        <span><?php echo $category3['title'];?></span>
												                    </a>
												                    <span class="categories_sublist_counter">14</span>
												                </div>
            												</li>
						                        		<?php }?>
						                        		<li>
											                <div class="categories_sublist_inner">
											                    <a class="categories_inner_title" href="/category/<?php echo $category2['href'];?>">
											                        <span>Все</span>
											                    </a>
											                    <span class="categories_sublist_counter">14</span>
											                </div>
            											</li>
					                        		</ul>
				                        		</div>
				                        		<a class="categories_popup_close" href="#"></a>
			                        		</div>
			                        	<?php }?>
									</li>
			                	<?php }?>
			                	<?php if($childrens1) {?>
							        <li>
							        	<div class="categories_sublist_inner">
				                            <a class="categories_inner_title" href="/category/<?php echo $category['href'];?>">
				                                <span>Все</span>
				                            </a>
				                            <span class="categories_sublist_counter">14</span>
			                        	</div>
							        </li>
							    <?php }?>
			                </ul>
		                <?php }?>
		            </div>
		        </li>
	        <?php }?>
        <?php }?>
    </ul>
</section>


