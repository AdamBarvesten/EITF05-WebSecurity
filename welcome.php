<?php
   include('session.php');
   if (isset($_POST["add_to_cart"])){
		echo isset($_SESSION["shopping_cart"]);
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
		echo var_dump($_SESSION["shopping_cart"]);
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
      <h1>Welcome <?php echo $login_session; ?></h1>
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
								<img src = "<?php echo $row["image_ref"];?>" width = 300px height=300px/>
								<h4><?php echo $row["name"]?></h4>
								<h4>$ <?php echo $row["price"]?></h4>
								<input type = "text" name = "quantity" value = "1"/>
								<input type = "hidden" name = "hidden_name" value = "<?php echo $row["name"]?>"/>
								<input type = "hidden" name = "hidden_price" value = "<?php echo $row["price"]?>"/>
								<input type = "submit" name = "add_to_cart" value = "Add to cart"/>
								
							</div>
						</form>
		<?php
				}
			}
		?>
		</div>
		<h2>Your Shopping Cart</h2>
		<div>
			<table>
				<tr>
					<th width = "40%"> Item Name </th>
					<th width = "10%"> Quantity </th>
					<th width = "20%"> Price </th>
					<th width = "15%"> Total </th>
					<th width = "5%"> action </th>
				</tr>
				<?php 
					if(!empty($_SESSION["shopping_cart"])){
						$total_price = 0;
						foreach($_SESSION["shopping_cart"] as $key => $val){
							?>
							<tr>
								<td align="center"><?php echo $val["product_name"];?></td>
								<td align="center"><?php echo $val["product_quantity"];?></td>
								<td align="center">$ <?php echo $val["product_price"];?></td>
								<td align="center">$ <?php echo number_format($val["product_quantity"] *$val["product_price"], 2);?></td>
								<td align="center"><a href="welcome.php?action=delete&id=<?php echo $val["product_id"];?>"><span class="text-danger">Remove</span></a></td>
							</tr>
						<?php
							$total_price = $total_price + $val["product_quantity"] * $val["product_price"]
						?>

							<?php
						}
						?>
					<tr>
						<td colspan="3" align="right">Total price</td>
						<td align="right">$ <?php echo number_format($total_price,2)?></td> 
						<td><a href="receipt.php"><button>Checkout and pay</button></a></td>


					</tr><?php
					
					}
				?>
			</table>
		</div>
		  <h2><a href = "logout.php">Sign Out</a></h2>

			
</html>
 