<?php include_once "class.cms.php";?>
<?php 
$cms->verify();//check if logged in or not

$parent_id = ($_GET["parent_id"]) ? $_GET["parent_id"] : FALSE;
$desc = ($_GET["desc"]) ? TRUE : FALSE;

$cats = $cms->list_category($parent_id, $desc);

if(count($cats) == 0){
	echo "<script>alert('There is not sub category in this category!')</script>";
}
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<h1 class="dashboard-h1">List Category</h1>
	<a href="/edit_category.php" class="action-btn margin-auto">Add Category</a>
	<br />
	<table>
		<?php if($_GET["parent_id"]){?>
			<tr>
				<th>Name</th>
				<th>Column 1</th>
				<th>C 2</th>
				<th>C 3</th>
				<th>C 4</th>
				<th>C 5</th>
				<th>C 6</th>
				<th>C 7</th>
				<th>C 8</th>
				<th>C 9</th>
				<th>C 10</th>
			</tr>
			<?php foreach ($cats as $cat): ?>
				<tr>
					<td><?=$cat['name']?></td><td><?=$cat['col1']?></td><td><?=$cat['col2']?></td><td><?=$cat['col3']?></td><td><?=$cat['col4']?></td><td><?=$cat['col5']?></td><td><?=$cat['col6']?></td><td><?=$cat['col7']?></td><td><?=$cat['col8']?></td><td><?=$cat['col9']?></td><td><?=$cat['col10']?></td><td><a href="http://<?=$_SERVER['HTTP_HOST'].'/edit_category.php?id='.$cat['id']?>" class="table-btn">EDIT</a></td><?php if(!$cat['top_level'] == 1){?><td><a href="http://<?=$_SERVER['HTTP_HOST'].'/list_product.php?cat_id='.$cat['id']?>" class="table-btn">PRODUCT LIST</a></td><?php }?>
				</tr>
			<?php endforeach ?>
		<?php } else{?>
			<tr>
				<th>Name</th>
			</tr>
			<?php foreach ($cats as $cat): ?>
				<tr>
					<td><a href="<?=strtok($_SERVER['REQUEST_URI'],'?').'?parent_id='.$cat['id']?>"><?=$cat['name']?></a></td>
				</tr>
			<?php endforeach ?>
		<?php }?>
	</table>
	<br />
	<a href="/edit_category.php" class="action-btn margin-auto">Add Category</a>
</div>

<?php include_once 'common/dashboard-footer.php';?>