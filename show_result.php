<?php include_once "class.cms.php";?>
<?php
$cat_id = $_GET["cat_id"];
$order = ($_GET["order"]) ? $_GET["order"] : FALSE;
$desc = ($_GET["desc"]) ? TRUE : FALSE;

$products = $cms->list_product($cat_id, $order, $desc);
$cat = $cms->retrieve_category($_GET['cat_id']);

if(count($products) == 0){
	echo "<script>alert('There is not sub category in this category!')</script>";
}

$desc_str = ($desc) ? FALSE : "&desc=1";
?>

<?php include_once 'common/public-html.php';?>

<?php include_once 'common/public-nav-bar.php';?>

<div class="width-container">
	<h1>List Product of <?=$cat['name']?></h1>
	<table class="show-result-table">
		<tr>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=name'.$desc_str?>" class="table-heading">Name</a></th>
			<th>Bank</th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col1'.$desc_str?>" class="table-heading"><?=$cat['col1']?></a></th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col2'.$desc_str?>" class="table-heading"><?=$cat['col2']?></a></th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col3'.$desc_str?>" class="table-heading"><?=$cat['col3']?></a></th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col4'.$desc_str?>" class="table-heading"><?=$cat['col4']?></a></th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col5'.$desc_str?>" class="table-heading"><?=$cat['col5']?></a></th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col6'.$desc_str?>" class="table-heading"><?=$cat['col6']?></a></th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col7'.$desc_str?>" class="table-heading"><?=$cat['col7']?></a></th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col8'.$desc_str?>" class="table-heading"><?=$cat['col8']?></a></th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col9'.$desc_str?>" class="table-heading"><?=$cat['col9']?></a></th>
			<th><a href="http://<?=$_SERVER['HTTP_HOST'].'/show_result.php?cat_id='.$_GET['cat_id'].'&order=col10'.$desc_str?>" class="table-heading"><?=$cat['col10']?></a></th>
		</tr>
		<?php foreach ($products as $product): ?>
			<tr>
				<td><?=$product['name']?></td><td><?=$cms->retrieve_bank($product['bank_id'])['name']?></td><td><?=$product['col1']?></td><td><?=$product['col2']?></td><td><?=$product['col3']?></td><td><?=$product['col4']?></td><td><?=$product['col5']?></td><td><?=$product['col6']?></td><td><?=$product['col7']?></td><td><?=$product['col8']?></td><td><?=$product['col9']?></td><td><?=$product['col10']?></td><td></td>
			</tr>
		<?php endforeach ?>
	</table>
</div>

<?php include_once 'common/public-footer.php';?>