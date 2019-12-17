</!DOCTYPE html>
<html>

<?php 
require "header.php";
if(isset($_GET['cat'])){
	$getCat = $_GET['cat'];
	
}
	$category = str_replace("-", " ", $getCat);
	$conn = mysqli_connect('localhost', 'root', 'sam', 'test');
	$query = "SELECT * FROM shopitems WHERE type='$category'";
	$data = mysqli_query($conn, $query);
	?>
	<body style="font-family: Raleway;">
	<h1 style="background-color: #fafafa; text-align: center; padding: 20px; border: 1px solid #eceeef; box-shadow: 2px 2px 2px 2px #969696;"><?php echo $category ?></h1>
	<div class="container">
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
</body>
</html>
