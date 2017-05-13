<?php include_once "class.cms.php";?>
<?php 
$cms->verify();//check if logged in or not

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id = ($_GET["id"]) ? $_GET["id"] : FALSE;
	
	//insert or update
	$insert_id = $cms->edit_category($id, $_POST);//insert, return lastInsertID
	if($insert_id == 1){//return 1 when update successfully
		echo '<script>alert("Update successfully!");</script>';
	}
	if($insert_id > 1){//return insert id when insert successfully
		echo '<script>alert("Insert successfully!");</script>';
		echo '<script>window.location = "http://'.$_SERVER['HTTP_HOST'].'/edit_category.php?id='.$insert_id.'";</script>';//redirect to the category page we just created//can't use php header since header function have to be used before any page output
	}
}

//get data
$main_cats = $cms->list_category();
$cat = $cms->retrieve_category($_GET['id']);
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<h1 class="dashboard-h1">Add/Edit Category</h1>
	<form method="post" data-parsley-validate>
		<div>Main Category</div>
		<select name="parent_id" data-parsley-type="integer" required>
		<?php if($cat['top_level'] == 1){?>
			<option value='0' selected>This is a main category</option>
		<?php }else{?>
			<option selected disabled>Please select main category</option>
			<option value='0'>This is a main category</option>
		<?php }foreach ($main_cats as $main_cat): ?>
			<?php if($main_cat['id'] == $cat['parent_id']){?>
				<option value='<?=$main_cat['id']?>' selected><?=$main_cat['name']?></option>
			<?php }else{?>
				<option value='<?=$main_cat['id']?>'><?=$main_cat['name']?></option>
		<?php }endforeach ?>
		</select>
		<div>Name</div>
		<input type="text" name="name" value='<?=$cat['name']?>' required>
		<div>Column 1</div>
		<input type="text" name="col1" value='<?=$cat['col1']?>'>
		<div>Column 2</div>
		<input type="text" name="col2" value='<?=$cat['col2']?>'>
		<div>Column 3</div>
		<input type="text" name="col3" value='<?=$cat['col3']?>'>
		<div>Column 4</div>
		<input type="text" name="col4" value='<?=$cat['col4']?>'>
		<div>Column 5</div>
		<input type="text" name="col5" value='<?=$cat['col5']?>'>
		<div>Column 6</div>
		<input type="text" name="col6" value='<?=$cat['col6']?>'>
		<div>Column 7</div>
		<input type="text" name="col7" value='<?=$cat['col7']?>'>
		<div>Column 8</div>
		<input type="text" name="col8" value='<?=$cat['col8']?>'>
		<div>Column 9</div>
		<input type="text" name="col9" value='<?=$cat['col9']?>'>
		<div>Column 10</div>
		<input type="text" name="col10" value='<?=$cat['col10']?>'>
		<br />
		<input type="submit" value='Save'>
		<a href="http://<?=$_SERVER['HTTP_HOST']."/delete_category.php?id=".$_GET['id']."&parent_id=".$cat['parent_id']?>" class="delete-btn margin-auto float-right">Delete</a>
	</form>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/js/parsley.min.js"></script>

<?php include_once 'common/dashboard-footer.php';?>