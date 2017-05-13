<?php
$nav_main_cats = $cms->list_category();

?>
<div class="width-container">
	<ul class="navbar">
		<li class="dropdown" onclick="">
			Product
			<ul class="sub-navbar">
				<?php foreach ($nav_main_cats as $nav_main_cat): ?>
					<li class="sub-dropdown"><div><?=$nav_main_cat['name']?></div></li>
					<?php $nav_sub_cats = $cms->list_category($nav_main_cat['id']);?>
					<?php foreach ($nav_sub_cats as $nav_sub_cat): ?>
						<li class="sub-dropdown"><a href="/show_result.php?cat_id=<?=$nav_sub_cat['id']?>"><div><?=$nav_sub_cat['name']?></div></a></li>
					<?php endforeach ?>
				<?php endforeach ?>
			</ul>
		</li>
		<li class="dropdown" onclick="">Something Else</li>
	</ul>
</div>