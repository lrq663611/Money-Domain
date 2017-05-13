<?php include_once "class.cms.php";?>
<?php 
$cms->verify();//check if logged in or not

$desc = ($_GET["desc"]) ? TRUE : FALSE;

$banks = $cms->list_bank($desc);
?>

<?php include_once 'common/dashboard-html.php';?>

<?php include_once 'common/dashboard-top-bar.php';?>

<div class="width-container">
	<h1 class="dashboard-h1">List Bank</h1>
	<a href="/edit_bank.php" class="action-btn margin-auto">Add Bank</a>
	<br />
	<table>
		<tr>
			<th>Name</th>
		</tr>
		<?php foreach ($banks as $bank): ?>
			<tr>
				<td><a href="http://<?=$_SERVER['HTTP_HOST'].'/edit_bank.php?id='.$bank['id']?>"><?=$bank['name']?></a></td>
			</tr>
		<?php endforeach ?>
	</table>
	<br />
	<a href="/edit_bank.php" class="action-btn margin-auto">Add Bank</a>
</div>

<?php include_once 'common/dashboard-footer.php';?>