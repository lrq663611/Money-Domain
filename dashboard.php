<?php include_once "class.cms.php";?>
<?php 
$cms->verify();//check if logged in or not
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<a href="/list_bank.php" class="dashboard-home-link">View Bank</a>
	<a href="/list_category.php" class="dashboard-home-link">View Category/Product</a>
</div>

<?php include_once 'common/dashboard-footer.php';?>