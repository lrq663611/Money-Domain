<?php include_once "class.cms.php";?>
<?php 
if($_POST['yes']){
	if($cms->delete_bank($_GET['id'])){//successful
		header("Location: http://".$_SERVER['HTTP_HOST']."/list_bank.php");
	}
	else{//failed
		header("Location: http://".$_SERVER['HTTP_HOST']."/edit_bank.php?id=".$_GET['id']);
	}
}
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<h1 class="dashboard-h1">Are you sure you want to delete this bank? Delete will not be successful if there is product related to this bank!</h1>
	<a href="http://<?=$_SERVER['HTTP_HOST']."/edit_bank.php?id=".$_GET['id']?>" class="action-btn margin-auto">No</a>
	<form method="post">
		<input type="submit" name="yes" value="Yes" class="delete-btn float-right">
	</form>
</div>

<?php include_once 'common/dashboard-footer.php';?>