<?php 

	require 'header.php';
	
	$conn = mysqli_connect('localhost', 'root', 'sam', 'test');
	$query = "SELECT * from cartitems WHERE user='".$_SESSION['email']."' GROUP BY id";
	$result = mysqli_query($conn, $query);
	# Cart Items
?>

<div class="container">
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-9">
			<div style="padding: 10px;">
				<table>
					<tr style="border-bottom: 1px solid #eceeef; ">
						<th style="padding-bottom:15px; text-align: center;"></th>
						<th style="padding-bottom:15px; padding-left: 15px; width: 500px;">Product Name</th>
						<th style="padding-bottom:15px; text-align: center;">Quantity</th>
						<th style="padding-bottom:15px; text-align: center;">Price</th>
						<th style="padding-bottom:15px; text-align: center;"></th>
					</tr>
					<?php while($row = mysqli_fetch_array($result)) { ?>

					<tr style="border-bottom: 1px solid #eceeef">
						<td style="padding: 5px 10px 5px 10px;"><img src="<?php echo $row['image'] ?>" style="max-width: 25px; max-height: 25px; width: auto; height: auto;" ></td>
						<td style="padding: 5px 10px 5px 10px;"><p><?php echo $row['name'] ?></p></td>
						<td width="90px" style="padding: 5px 10px 5px 10px; text-align: center; min-width: 90px;">
							<?php 

							?><a href="deleteitem.php?id=<?php echo $row['id']; ?>" class="btn fa fa-minus" name="remove_item" style="padding: 5px;"></a><span style="padding: 5px;"><?php 
							$query_pre = "SELECT * from cartitems WHERE name='".$row['name']."' AND user='".$_SESSION['email']."'";
							$query_item = mysqli_query($conn, $query_pre);
							$count_item = mysqli_num_rows($query_item);
							echo $count_item; ?></span><span><a href="operation.php?id=<?php echo $row['id']; ?>" class="btn fa fa-plus" name="add_item" style="padding: 5px;"></a></span></td>
						<td style="padding: 5px 10px 5px 10px; text-align: center;"><p><?php echo '₹'.$row['discountedprice'] * $count_item; ?></p></td>
						<td style="padding: 5px 10px 5px 10px; text-align: center;"><a href="deletemulti_item.php?id=<?php echo $row['id']; ?>"><i class="btn fa fa-trash"></i></a></td>
					</tr>

					
					<?php } ?>
				</table>
			</div>
		</div>
		<div class="col-md-3">
			<table>
				<h3 style="margin-bottom: 20px;">Your Cart Summary</h3>
				<tr style="border-bottom: 1px solid #eceeef">
					<td style="padding: 10px;">Sub-Total</td>
					<td width="150px" style="padding: 10px;"><?php $total_query=mysqli_query($conn, "SELECT SUM(discountedprice) as total_price from cartitems WHERE user='".$_SESSION['email']."'");

						$fetch = mysqli_fetch_array($total_query);
						echo '₹'.$fetch['total_price'];
					 ?></td>
				</tr>
				<tr style="border-bottom: 1px solid #eceeef">
					 <td style="padding: 10px;">Shipping</td>
					 <td width="150px" style="padding: 10px;"><?php $shipping=50; echo '₹'.$shipping; ?></td>
				</tr>
				<tr style="border-bottom: 1px solid #eceeef; background-color: #eceeef;">
					<td width="70%" style="padding: 10px;">Total</td>
					<td style="padding: 10px; font-weight: bold;"><?php $total = $fetch['total_price']+$shipping; echo '₹'.$total; ?></td>
				</tr>
			</table>
			<div align="center" style="margin-top: 15px;">
				<button class="btn btn-primary">Checkout</button>	
			</div>
			
		</div>
	</div>
</div>

<?php 
	# SUGGESTED PRODUCTS

	$query1 = "SELECT * FROM shopitems WHERE type='Groceries' ORDER BY RAND() LIMIT 3";
	$data = mysqli_query($conn, $query1);
?>
<div class="container" style="margin-top: 25px;">
	<h3>Suggested Products on Groceries</h3>
	<div class="row justify-content-center" >
	<?php
	while ($item = mysqli_fetch_array($data)) {
?>
	<div class="col-md-4" style="float: left; align-content: center; margin-top: 20px; min-width: 310px;">
		<div style="padding: 20px; border: 1px solid #eceeef; box-shadow: 2px 4px 4px 2px #969696;">
			<a href="">
				<img src="<?php echo $item['image']; ?>" style="max-width: 250px; max-height: 250px; width: auto; height: auto;">
				<?php if ($item['type']=="Groceries"): ?>
				<p style="font-size: 20px; font-weight: bold; color: #000000; text-underline-position: unset; "><?php echo $item['name'] . ' - ' . $item['quantity'] .' '.$item['units']; ?></p>
				<?php else: ?>
					<p style="font-size: 20px; font-weight: bold; color: #000000; text-underline-position: unset; "><?php echo $item['name'] ?></p>
				<?php endif ?>
			</a>
			<p><strike><?php echo '₹'.$item['price']; ?></strike> <span style="font-weight: bold; font-size: 18px;"><?php echo '₹'.$item['discountedprice']; ?></span></p>
			<?php if(!isset($_SESSION)):?>
				<button data-target="#signin" data-toggle="modal" style="font-weight: bold;" class="btn btn-warning">Add to Cart</button>
				
			<?php else:?>
				<?php 
				$query_check = mysqli_query($conn, "SELECT * from cartitems WHERE id='".$item['id']."' AND user='".$_SESSION['email']."'");
				
				$query_check_count = mysqli_num_rows($query_check);
				if($query_check_count==0):?>
				<a href="operation.php?id=<?php echo $item['id'] ?>" name="addtocart" style="font-weight: bold;" class="btn btn-warning">Add to Cart</a>
				<?php else:?>
					<a href="" name="addedtocart" style="font-weight: bold;" class="btn btn-warning"><i class="fa fa-check"></i><span>Added to Cart</span></a>
				<?php endif ?>
		<?php endif ?>
		</div>	
	</div>
	
	
<?php	
	}
?>
	</div>
</div>

<?php 
	$query2 = "SELECT * FROM shopitems WHERE type='Mobile Phones' ORDER BY RAND() LIMIT 3";
	$data1 = mysqli_query($conn, $query2);
?>

<div class="container" style="margin-top: 25px;">
	<h3>Suggested Products on Mobile Phones</h3>
	<div class="row justify-content-center" >
	<?php
	while ($item = mysqli_fetch_array($data1)) {
?>
	<div class="col-md-4" style="float: left; align-content: center; margin-top: 20px; min-width: 310px;">
		<div style="padding: 20px; border: 1px solid #eceeef; box-shadow: 2px 4px 4px 2px #969696;">
			<a href="">
				<img src="<?php echo $item['image']; ?>" style="max-width: 250px; max-height: 250px; width: auto; height: auto;">
				<?php if ($item['type']=="Groceries"): ?>
				<p style="font-size: 20px; font-weight: bold; color: #000000; text-underline-position: unset; "><?php echo $item['name'] . ' - ' . $item['quantity'] .' '.$item['units']; ?></p>
				<?php else: ?>
					<p style="font-size: 20px; font-weight: bold; color: #000000; text-underline-position: unset; "><?php echo $item['name'] ?></p>
				<?php endif ?>
			</a>
			<p><strike><?php echo '₹'.$item['price']; ?></strike> <span style="font-weight: bold; font-size: 18px;"><?php echo '₹'.$item['discountedprice']; ?></span></p>
			<?php if(!isset($_SESSION)):?>
				<button data-target="#signin" data-toggle="modal" style="font-weight: bold;" class="btn btn-warning">Add to Cart</button>
				
			<?php else:?>
				<?php 
				$query_check = mysqli_query($conn, "SELECT * from cartitems WHERE id='".$item['id']."' AND user='".$_SESSION['email']."'");
				
				$query_check_count = mysqli_num_rows($query_check);
				if($query_check_count==0):?>
				<a href="operation.php?id=<?php echo $item['id'] ?>" name="addtocart" style="font-weight: bold;" class="btn btn-warning">Add to Cart</a>
				<?php else:?>
					<a href="" name="addedtocart" style="font-weight: bold;" class="btn btn-warning"><i class="fa fa-check"></i><span>Added to Cart</span></a>
				<?php endif ?>
		<?php endif ?>
		</div>	
	</div>
	
	
<?php	
	}
?>
	</div>
</div>