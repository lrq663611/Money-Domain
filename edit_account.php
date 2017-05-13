<?php include_once "class.cms.php";?>
<?php 
$cms->verify();//check if logged in or not

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($cms->edit_account($_POST) == 1){
		echo '<script>alert("Update successfully!");</script>';
	}
}

//get data
$account = $cms->retrieve_account();
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<h1 class="dashboard-h1">Edit My Account Details</h1>
	<form method="post" data-parsley-validate>
		<div>Username</div>
		<input type="text" name="username" value="<?=$account['username']?>" required>
		<div>Password</div>
		<input type="password" name="password" required>
		<input type="submit" value="Save">
	</form>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/js/parsley.min.js"></script>

<?php include_once 'common/dashboard-footer.php';?>