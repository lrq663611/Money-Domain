<?php include_once "class.cms.php";?>
<?php 
$cms->verify();//check if logged in or not

$cat_id = $_GET["cat_id"];
$order = ($_GET["order"]) ? $_GET["order"] : FALSE;
$desc = ($_GET["desc"]) ? TRUE : FALSE;

$products = $cms->list_product($cat_id, $order, $desc);
$cat = $cms->retrieve_category($_GET['cat_id']);

if(count($products) == 0){
	echo "<script>alert('There is not sub category in this category!')</script>";
}
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<h1 class="dashboard-h1">List Product</h1>
	<a href="/edit_product.php?from_cat_id=<?=$cat_id?>" class="action-btn margin-auto">Add Product</a>
	<br />
	<table>
		<tr>
			<th><?=$cat['name']?></th>
			<th>Bank</th>
			<th><?=$cat['col1']?></th>
			<th><?=$cat['col2']?></th>
			<th><?=$cat['col3']?></th>
			<th><?=$cat['col4']?></th>
			<th><?=$cat['col5']?></th>
			<th><?=$cat['col6']?></th>
			<th><?=$cat['col7']?></th>
			<th><?=$cat['col8']?></th>
			<th><?=$cat['col9']?></th>
			<th><?=$cat['col10']?></th>
		</tr>
		<?php foreach ($products as $product): ?>
			<tr>
				<td><?=$product['name']?></td><td><?=$cms->retrieve_bank($product['bank_id'])['name']?></td><td><?=$product['col1']?></td><td><?=$product['col2']?></td><td><?=$product['col3']?></td><td><?=$product['col4']?></td><td><?=$product['col5']?></td><td><?=$product['col6']?></td><td><?=$product['col7']?></td><td><?=$product['col8']?></td><td><?=$product['col9']?></td><td><?=$product['col10']?></td><td><a href="http://<?=$_SERVER['HTTP_HOST'].'/edit_product.php?id='.$product['id']?>" class="table-btn">EDIT</a></td>
			</tr>
		<?php endforeach ?>
	</table>
	<br />
	<a href="/edit_product.php?from_cat_id=<?=$cat_id?>" class="action-btn margin-auto">Add Product</a>
</div>

<?php include_once 'common/dashboard-footer.php';?>