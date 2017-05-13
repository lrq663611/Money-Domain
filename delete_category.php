<?php include_once "class.cms.php";?>
<?php 
if($_POST['yes']){
	if($cms->delete_category($_GET['id'])){//successful
		header("Location: http://".$_SERVER['HTTP_HOST']."/list_category.php?parent_id=".$_GET['parent_id']);
	}
	else{//failed
		header("Location: http://".$_SERVER['HTTP_HOST']."/edit_category.php?id=".$_GET['id']);
	}
}
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<h1 class="dashboard-h1">Are you sure you want to delete this category? All products belong to this category will be deleted as well!</h1><!--Note: if this category contains child category, delete will not be successful-->
	<a href="http://<?=$_SERVER['HTTP_HOST']."/edit_category.php?id=".$_GET['id']?>" class="action-btn margin-auto">No</a>
	<form method="post">
		<input type="submit" name="yes" value="Yes" class="delete-btn float-right">
	</form>
</div>

<?php include_once 'common/dashboard-footer.php';?>