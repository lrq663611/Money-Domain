<?php include_once "class.cms.php";?>
<?php 
$cms->verify();//check if logged in or not

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$id = ($_GET["id"]) ? $_GET["id"] : FALSE;
	
	//insert or update
	$insert_id = $cms->edit_bank($id, $_POST);//insert, return lastInsertID
	if($insert_id == 1){//return 1 when update successfully
		echo '<script>alert("Update successfully!");</script>';
	}
	if($insert_id > 1){//return insert id when insert successfully
		echo '<script>alert("Insert successfully!");</script>';
		echo '<script>window.location = "http://'.$_SERVER['HTTP_HOST'].'/edit_bank.php?id='.$insert_id.'";</script>';//redirect to the bank page we just created//can't use php header since header function have to be used before any page output
	}
}

//get data
$bank = $cms->retrieve_bank($_GET['id']);
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<h1 class="dashboard-h1">Add/Edit Bank</h1>
	<form method="post">
		<div>Name</div>
		<input type="text" name="name" value='<?=$bank['name']?>' required>
		<br />
		<input type="submit" value='Save'>
		<a href="http://<?=$_SERVER['HTTP_HOST']."/delete_bank.php?id=".$_GET['id']?>" class="delete-btn margin-auto float-right">Delete</a>
	</form>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="/js/parsley.min.js"></script>

<?php include_once 'common/dashboard-footer.php';?>