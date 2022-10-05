<?php
   include('session.php');
	// for SQL Injection
   /*$rows;
   //Displaying sql malicious query and its result for demo purpose
	echo('SQL Query  - '.$_SESSION['sql_query'].'</br>');
	echo('Number of records is '.$_SESSION['count'].'</br>');
	if(isset($_SESSION['query_result'])){
	$rows = $_SESSION['query_result'];
	var_dump($_SESSION);
	echo("<br/>");	
	}

	for($i=0;$i<count($rows);$i++){	 
		print_r($rows[$i]);
		echo("<br/>");
	}*/	
   if (isset($_POST["add_to_cart"])){
		if(isset($_SESSION["shopping_cart"])){
			$all_products_in_cart = array_column($_SESSION["shopping_cart"], "product_id");
			if(!in_array($_GET["id"], $all_products_in_cart)){
				$nr_products_in_cart = count($_SESSION["shopping_cart"]);
				$product_array = array(
					'product_id' => $_GET["id"],
					'product_name' => $_POST["hidden_name"],
					'product_price' => $_POST["hidden_price"],
					'product_quantity' => $_POST["quantity"]
				);
				$_SESSION["shopping_cart"][$nr_products_in_cart] = $product_array;
			}else{
					echo '<script>alert("Item Already Added")</script>';  
                	echo '<script>window.location="welcome.php"</script>'; 
			}
		}else{
			$product_array = array(
				'product_id' => $_GET["id"],
				'product_name' => $_POST["hidden_name"],
				'product_price' => $_POST["hidden_price"],
				'product_quantity' => $_POST["quantity"]
			);
			$_SESSION["shopping_cart"][0] = $product_array;
		}
		echo '<script>window.location="welcome.php"</script>'; 	
   }

   if(isset($_GET['action'])){
	   if($_GET["action"] == "delete"){
		   foreach($_SESSION["shopping_cart"] as $keys => $values){
				if($values["product_id"] == $_GET["id"]){
					unset($_SESSION["shopping_cart"][$keys]);
					$_SESSION["shopping_cart"] = array_values($_SESSION["shopping_cart"]);
					echo '<script>alert("Item Removed")</script>';
					echo '<script>window.location="welcome.php"</script>'; 
				}
		   }
	   }
   }

?>
<html>


<style type="text/css">

	#wrapper {
		width: 100%;
		border: 1px solid black;
		overflow: hidden;
		box-sizing: content-box;
	}
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		float:left;
		border: solid thin #aaa;
		width: 300px;
		height: 500px;
		box-sizing: content-box;
	}
</style>


   <head>
      <title>Welcome </title>
   </head>
   <body>
	  <ul>
	  	<li class='active' style='float:center;'><h1><?php echo "Welcome: " . htmlspecialchars($login_session);?></h1> </li>
		<li class='active' style='float:center;'><h2><?php echo '<a href="logout.php"><span>Logout</span></a>'?></h2></li>
	  </ul>
	  	<div id = "wrapper">
		  <?php
		  	$product_query = "SELECT * FROM tbl_products ORDER BY id ASC"; 
			$products = mysqli_query($con, $product_query);
		  	$rows;
		  	if (mysqli_num_rows($products)>0){
				while($row = mysqli_fetch_array($products)){
					?>
						<form method="post" action = "welcome.php?action=add&id=<?php echo $row["id"];?>">
							<div  id="box">
								<img src = "<?php echo htmlspecialchars($row["image_ref"]);?>" width = 300px height=300px/>
								<h4><?php echo htmlspecialchars($row["name"])?></h4>
								<h4>$ <?php echo htmlspecialchars($row["price"])?></h4>
								<h4><a href="<?php echo htmlspecialchars($row["info"])?>">More info</a></h4>
								<input type = "text" name = "quantity" value = "1"/>
								<input type = "hidden" name = "hidden_name" value = "<?php echo htmlspecialchars($row["name"])?>"/>
								<input type = "hidden" name = "hidden_price" value = "<?php echo htmlspecialchars($row["price"])?>"/>
								<input type = "submit" name = "add_to_cart" value = "Add to cart"/>
								
							</div>
						</form>
		<?php
				}
			}
		?>
		</div>
		<h2 align="center">Your Shopping Cart</h2>
		<div>
			<table>
				<tr>
					<th width = "40%" align="left"> Item Name </th>
					<th width = "10%" align="left"> Quantity </th>
					<th width = "20%" align="left"> Price </th>
					<th width = "15%" align="left"> Total </th>
					<th width = "5%" align="left"> action </th>
				</tr>
				<?php 
					if(!empty($_SESSION["shopping_cart"])){
						$total_price = 0;
						foreach($_SESSION["shopping_cart"] as $key => $val){
							?>
							<tr>
								<td align="left"><?php echo htmlspecialchars($val["product_name"]);?></td>
								<td align="left"><?php echo htmlspecialchars($val["product_quantity"]);?></td>
								<td align="left">$ <?php echo htmlspecialchars($val["product_price"]);?></td>
								<td align="left">$ <?php echo number_format($val["product_quantity"] *$val["product_price"], 2);?></td>
								<td align="left"><a href="welcome.php?action=delete&id=<?php echo $val["product_id"];?>"><button class="text-danger">Remove</button></a></td>
							</tr>
						<?php
							$total_price = $total_price + $val["product_quantity"] * $val["product_price"]
						?>

							<?php
						}
						?>
					<tr>
						<th colspan="3" align="right">Total price:</th>
						<td align="left">$ <?php echo number_format($total_price,2)?></td> 
						<td align="left"><a href="receipt.php"><button>Checkout and pay</button></a></td>

					</tr><?php
					
					}
				?>
			</table>
</html>
 