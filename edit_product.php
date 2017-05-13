<?php include_once "class.cms.php";?>
<?php 
$cms->verify();//check if logged in or not

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id = ($_GET["id"]) ? $_GET["id"] : FALSE;
	
	//insert or update
	$insert_id = $cms->edit_product($id, $_POST);//insert, return lastInsertID
	if($insert_id == 1){//return 1 when update successfully
		echo '<script>alert("Update successfully!");</script>';
	}
	if($insert_id > 1){//return insert id when insert successfully
		echo '<script>alert("Insert successfully!");</script>';
		echo '<script>window.location = "http://'.$_SERVER['HTTP_HOST'].'/edit_product.php?id='.$insert_id.'";</script>';//redirect to the product page we just created//can't use php header since header function have to be used before any page output
	}
}

//get data
$banks = $cms->list_bank();
$product = $cms->retrieve_product($_GET['id']);
$cat = ($_GET['from_cat_id']) ? $cms->retrieve_category($_GET['from_cat_id']) : $cms->retrieve_category($product['cat_id']);//if from_cat_id is set in url, it is creating new product, otherwise it is editing
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<h1 class="dashboard-h1">Add/Edit Product</h1>
	<form method="post" data-parsley-validate>
		<div>Category</div>
		<div style="font-weight: bold; margin: 10px;"><?=$cat['name']?></div>
		<input type="hidden" name="cat_id" value='<?=$cat['id']?>'>
		<div>Bank</div>
		<select name="bank_id" data-parsley-type="integer" required>
		<option selected disabled>Select a bank</option>
		<?php foreach ($banks as $bank): ?>
			<?php if($bank['id'] == $product['bank_id']){?>
				<option value='<?=$bank['id']?>' selected><?=$bank['name']?></option>
			<?php }else{?>
				<option value='<?=$bank['id']?>'><?=$bank['name']?></option>
		<?php }endforeach ?>
		</select>
		<div>Name</div>
		<input type="text" name="name" value='<?=$product['name']?>' required>
		<div><?=$cat['col1']?></div>
		<input type="text" name="col1" value='<?=$product['col1']?>'>
		<div><?=$cat['col2']?></div>
		<input type="text" name="col2" value='<?=$product['col2']?>'>
		<div><?=$cat['col3']?></div>
		<input type="text" name="col3" value='<?=$product['col3']?>'>
		<div><?=$cat['col4']?></div>
		<input type="text" name="col4" value='<?=$product['col4']?>'>
		<div><?=$cat['col5']?></div>
		<input type="text" name="col5" value='<?=$product['col5']?>'>
		<div><?=$cat['col6']?></div>
		<input type="text" name="col6" value='<?=$product['col6']?>'>
		<div><?=$cat['col7']?></div>
		<input type="text" name="col7" value='<?=$product['col7']?>'>
		<div><?=$cat['col8']?></div>
		<input type="text" name="col8" value='<?=$product['col8']?>'>
		<div><?=$cat['col9']?></div>
		<input type="text" name="col9" value='<?=$product['col9']?>'>
		<div><?=$cat['col10']?></div>
		<input type="text" name="col10" value='<?=$product['col10']?>'>
		<br />
		<input type="submit" value='Save'>
		<a href="http://<?=$_SERVER['HTTP_HOST']."/delete_product.php?id=".$_GET['id']."&cat_id=".$cat['id']?>" class="delete-btn margin-auto float-right">Delete</a>
	</form>
	<?php if($product){
		echo "<div>Last Edit: ".date('Y-m-d H:i:s', $product['last_edit'])." ".date_default_timezone_get()."</div>";
	}?>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/js/parsley.min.js"></script>

<?php include_once 'common/dashboard-footer.php';?>