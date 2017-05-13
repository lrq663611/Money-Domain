<?php include_once "class.cms.php";?>
<?php 
$cms->login($_POST['username'], $_POST['password']);//check if logged in or not
?>

<?php include_once 'common/public-html.php';?>

<?php include_once 'common/public-nav-bar.php';?>

<div class="width-container">
	<h1>Login to Money Domain</h1>
	<form method="post">
		<div>Username</div>
		<input type="text" name="username">
		<div>Password</div>
		<input type="password" name="password">
		<br />
		<input type="submit" value="Login">
	</form>
</div>

<?php include_once 'common/public-footer.php';?>