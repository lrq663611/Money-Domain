<?php
class Cms
{
	public $pdo; 
	
	public function __construct()
	{
		//default timezone is Africa/Nairobi
		//date_default_timezone_set("Australia/Sydney");

		try{
			$this->pdo = new PDO('mysql:host=localhost;dbname=moneydom_cms', 'moneydom_admin1', 'dc]0Zc8@m~5(');
			//$this->pdo = null;//close it when finished
		}
		catch (PDOException $e){
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	}
	
	public function list_category($parent = FALSE, $desc = FALSE)
	{
		if($parent === FALSE)//list main cat
		{
			$stmt = $this->pdo->prepare('SELECT * FROM category WHERE top_level = 1');
			$stmt->execute();
		}
		elseif($desc === FALSE)//list sub cat//order by name ASC
		{
			$stmt = $this->pdo->prepare('SELECT * FROM category WHERE parent_id = :parent ORDER BY name ASC');
			$stmt->execute(array(':parent' => $parent));
		}
		else//list sub cat//order by name DESC
		{
			$stmt = $this->pdo->prepare('SELECT * FROM category WHERE parent_id = :parent ORDER BY name DESC');
			$stmt->execute(array(':parent' => $parent));
		}

		$result = $stmt->fetchAll();
		return $result;
	}
	
	public function retrieve_category($id)
	{
		$stmt = $this->pdo->prepare('SELECT * FROM category WHERE id = :id');
		$stmt->execute(array(':id' => $id));
		$result = $stmt->fetch();
		return $result;
	}
	
	public function edit_category($id = FALSE, $category)
	{
		//sample data to test
		//$id = 20;
		//$category['parent_id'] = 0;
		//$category['name'] = "nsnnnsdfnnn";
		//$category['col1'] = "sdfsdf";
		//$category['col2'] = "sdfsdf";
		//$category['col3'] = "sdfsdf";
		//$category['col4'] = "sdfsdf";
		//$category['col5'] = "sdfsdf";
		//$category['col6'] = "sdfsdf";
		//$category['col7'] = "sdfsdf";
		//$category['col8'] = "sdfsdf";
		//$category['col9'] = "sdfsdf";
		//$category['col10'] = "sdfsd";

		if($id === FALSE)//add category
		{
			$stmt = $this->pdo->prepare('INSERT INTO category (parent_id, top_level, name, col1, col2, col3, col4, col5, col6, col7, col8, col9, col10) values (:parent_id, :top_level, :name, :col1, :col2, :col3, :col4, :col5, :col6, :col7, :col8, :col9, :col10)');
		}
		
		else//edit category
		{
			$stmt = $this->pdo->prepare('UPDATE category SET parent_id = :parent_id, top_level = :top_level, name = :name, col1 = :col1, col2 = :col2, col3 = :col3, col4 = :col4, col5 = :col5, col6 = :col6, col7 = :col7, col8 = :col8, col9 = :col9, col10 = :col10 WHERE id = :id');
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		}
		
		if($category['parent_id'] == 0)//top level
		{
			$stmt->bindValue(':parent_id', null, PDO::PARAM_INT);
			$stmt->bindValue(':top_level', 1, PDO::PARAM_INT);
		}
		else//sub cat
		{
			$stmt->bindValue(':parent_id', $category['parent_id'], PDO::PARAM_INT);
			$stmt->bindValue(':top_level', null, PDO::PARAM_INT);
		}
		
		$stmt->bindValue(':name', $category['name'], PDO::PARAM_STR);
		$stmt->bindValue(':col1', $category['col1'], PDO::PARAM_STR);
		$stmt->bindValue(':col2', $category['col2'], PDO::PARAM_STR);
		$stmt->bindValue(':col3', $category['col3'], PDO::PARAM_STR);
		$stmt->bindValue(':col4', $category['col4'], PDO::PARAM_STR);
		$stmt->bindValue(':col5', $category['col5'], PDO::PARAM_STR);
		$stmt->bindValue(':col6', $category['col6'], PDO::PARAM_STR);
		$stmt->bindValue(':col7', $category['col7'], PDO::PARAM_STR);
		$stmt->bindValue(':col8', $category['col8'], PDO::PARAM_STR);
		$stmt->bindValue(':col9', $category['col9'], PDO::PARAM_STR);
		$stmt->bindValue(':col10', $category['col10'], PDO::PARAM_STR);
		if($id === FALSE)//add category
		{
			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
		else//edit category
		{
			return $stmt->execute();
		}
	}
	
	public function delete_category($id)
	{
		$stmt = $this->pdo->prepare('DELETE FROM category WHERE id = :id');
		return $stmt->execute(array(':id' => $id));//return true on success
	}
	
	public function list_bank($desc = FALSE)
	{
		if($desc === FALSE)
		{
			$stmt = $this->pdo->prepare('SELECT * FROM bank ORDER BY name ASC');
			$stmt->execute();
		}
		else//list sub cat//order by name DESC
		{
			$stmt = $this->pdo->prepare('SELECT * FROM bank ORDER BY name DESC');
			$stmt->execute();
		}

		$result = $stmt->fetchAll();
		return $result;
	}
	
	public function retrieve_bank($id)
	{
		$stmt = $this->pdo->prepare('SELECT * FROM bank WHERE id = :id');
		$stmt->execute(array(':id' => $id));
		$result = $stmt->fetch();
		return $result;
	}
	
	public function edit_bank($id = FALSE, $category)
	{
		if($id === FALSE)//add bank
		{
			$stmt = $this->pdo->prepare('INSERT INTO bank (name) values (:name)');
			$stmt->bindValue(':name', $category['name'], PDO::PARAM_STR);
			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
		
		else//edit bank
		{
			$stmt = $this->pdo->prepare('UPDATE bank SET name = :name WHERE id = :id');
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
			$stmt->bindValue(':name', $category['name'], PDO::PARAM_STR);
			return $stmt->execute();
		}
	}
	
	public function delete_bank($id)
	{
		$stmt = $this->pdo->prepare('DELETE FROM bank WHERE id = :id');
		return $stmt->execute(array(':id' => $id));//return true on success
	}
	
	public function list_product($cat_id, $order = FALSE, $desc = FALSE)
	{
		switch ($order) {//use this to create a valid white list can also prevent injection
			case "col1":
				$order = "col1";
				break;
			case "col2":
				$order = "col2";
				break;
			case "col3":
				$order = "col3";
				break;
			case "col4":
				$order = "col4";
				break;
			case "col5":
				$order = "col5";
				break;
			case "col6":
				$order = "col6";
				break;
			case "col7":
				$order = "col7";
				break;
			case "col8":
				$order = "col8";
				break;
			case "col9":
				$order = "col9";
				break;
			case "col10":
				$order = "col10";
				break;
			default:
				$order = "name";
		}
		if($desc === FALSE)
		{
			$stmt = $this->pdo->prepare('SELECT * FROM product WHERE cat_id = :cat_id ORDER BY '.$order.' ASC');//here order is not binded, we can not bind column name in PDO prepare statement
			$stmt->execute(array(':cat_id' => $cat_id));
		}
		else
		{
			$stmt = $this->pdo->prepare('SELECT * FROM product WHERE cat_id = :cat_id ORDER BY '.$order.' DESC');//here order is not binded, we can not bind column name in PDO prepare statement
			$stmt->execute(array(':cat_id' => $cat_id));
		}

		$result = $stmt->fetchAll();
		//echo $stmt->queryString;
		return $result;
	}
	
	public function retrieve_product($id)
	{
		$stmt = $this->pdo->prepare('SELECT * FROM product WHERE id = :id');
		$stmt->execute(array(':id' => $id));
		$result = $stmt->fetch();
		return $result;
	}
	
	public function edit_product($id = FALSE, $product)
	{
		if($id === FALSE)//add product
		{
			$stmt = $this->pdo->prepare('INSERT INTO product (cat_id, bank_id, name, last_edit, col1, col2, col3, col4, col5, col6, col7, col8, col9, col10) values (:cat_id, :bank_id, :name, :last_edit, :col1, :col2, :col3, :col4, :col5, :col6, :col7, :col8, :col9, :col10)');
		}
		
		else//edit product
		{
			$stmt = $this->pdo->prepare('UPDATE product SET cat_id = :cat_id, bank_id = :bank_id, name = :name, last_edit = :last_edit, col1 = :col1, col2 = :col2, col3 = :col3, col4 = :col4, col5 = :col5, col6 = :col6, col7 = :col7, col8 = :col8, col9 = :col9, col10 = :col10 WHERE id = :id');
			$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		}
		
		$stmt->bindValue(':cat_id', $product['cat_id'], PDO::PARAM_INT);
		$stmt->bindValue(':bank_id', $product['bank_id'], PDO::PARAM_INT);
		$stmt->bindValue(':name', $product['name'], PDO::PARAM_STR);
		$stmt->bindValue(':last_edit', time(), PDO::PARAM_STR);
		$stmt->bindValue(':col1', $product['col1'], PDO::PARAM_STR);
		$stmt->bindValue(':col2', $product['col2'], PDO::PARAM_STR);
		$stmt->bindValue(':col3', $product['col3'], PDO::PARAM_STR);
		$stmt->bindValue(':col4', $product['col4'], PDO::PARAM_STR);
		$stmt->bindValue(':col5', $product['col5'], PDO::PARAM_STR);
		$stmt->bindValue(':col6', $product['col6'], PDO::PARAM_STR);
		$stmt->bindValue(':col7', $product['col7'], PDO::PARAM_STR);
		$stmt->bindValue(':col8', $product['col8'], PDO::PARAM_STR);
		$stmt->bindValue(':col9', $product['col9'], PDO::PARAM_STR);
		$stmt->bindValue(':col10', $product['col10'], PDO::PARAM_STR);
		if($id === FALSE)//add product
		{
			$stmt->execute();
			return $this->pdo->lastInsertId();
		}
		else//edit product
		{
			return $stmt->execute();
		}
	}
	
	public function delete_product($id)
	{
		$stmt = $this->pdo->prepare('DELETE FROM product WHERE id = :id');
		return $stmt->execute(array(':id' => $id));//return true on success
	}
	
	public function retrieve_account()
	{
		$id = $_SESSION['user_id'];
		$stmt = $this->pdo->prepare('SELECT * FROM user WHERE id = :id');
		$stmt->execute(array(':id' => $id));
		$result = $stmt->fetch();
		return $result;
	}
	
	public function edit_account($account)
	{
		$id = $_SESSION['user_id'];
		$account['password'] = md5($account['password']);
		$stmt = $this->pdo->prepare('UPDATE user SET username = :username, password = :password WHERE id = :id');
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->bindValue(':username', $account['username'], PDO::PARAM_STR);
		$stmt->bindValue(':password', $account['password'], PDO::PARAM_STR);
		return $stmt->execute();
	}
	
	public function login($username, $password)
	{
		$password = md5($password);
		$stmt = $this->pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
		$stmt->execute(array(':username' => $username, ':password' => $password));
		$row = $stmt->rowCount();
		$result = $stmt->fetch();
		if($row > 0)
		{
			session_start();
			$_SESSION['user_id'] = $result['id'];//user_id
			header("Location: http://".$_SERVER['HTTP_HOST']."/dashboard.php");
		}
	}
	
	public function logout()
	{
		session_start();
		session_destroy();
		header("Location: http://".$_SERVER['HTTP_HOST']."/login.php");
	}
	
	public function verify()
	{
		session_start();
		if(!isset($_SESSION['user_id'])){//not logged in
			header("Location: http://".$_SERVER['HTTP_HOST']."/login.php");
		}
	}
}

$cms = new Cms();

/* USAGE
$cms = new Cms();

$cms->list_category();//return only top level categories
$cms->list_category(1);//return categories which have parent_id 1, order by name
$cms->list_category(1, 3);//return categories which have parent_id 1, order by name DESC//the second para is desc if presents

$cms->retrieve_category(1);//return details of category 1

$cms->edit_category(FALSE, $category);//add category//first para cat_id or FALSE, second para array contains cat details
$cms->edit_category(2, $category);//edit category number 2//form of $category see sample data to test

$cms->delete_category(5);//return true on success false on failed

$cms->list_bank();//return banks order by name
$cms->list_bank(5);//return banks order by name DESC//the second para is desc if presents

$cms->retrieve_bank(1);//return details of bank 1

$cms->edit_bank(FALSE, $bank);//add bank//first para bank_id or FALSE, second para array contains bank details
$cms->edit_bank(2, $bank);//edit bank number 2

$cms->delete_bank(5);//return true on success false on failed

$cms->list_product(22, "name", 3);//return product of cat 22, order by name, desc

$cms->retrieve_product(1);//return details of product 1

$cms->edit_product(FALSE, $product);//add product//first para product_id or FALSE, second para array contains product details
$cms->edit_product(2, $product);//edit product number 2

$cms->delete_product(5);//return true on success false on failed

$cms->retrieve_account();//return details of account which's account is stored in session;

$cms->edit_account($account);//$account contains information of account which's account is stored in session;

$cms->login("moneydom", "avangate2014");

$cms->logout();

$cms->verify();
*/