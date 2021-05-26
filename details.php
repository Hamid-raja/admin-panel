<?php include 'include/header.php'; ?>
<?php
if (isset($_GET['proId'])) {
    $proId = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proId']);
}

?>
<style type="text/css">
	.mybutton{widows: 100px; float:left; margin-right: 30px;}
</style>
<div class="main">
	<div class="content">
		<div class="section group">
			<div class="cont-desc span_1_of_2">
				<?php 
                $getPd = $pd->getSingleProduct($proId);
                if ($getPd) {
                    while ($result = $getPd->fetch_assoc()) {
                        ?>
				<div class="grid images_3_of_2">
					<img src="admin/<?php echo $result['image']; ?>" alt="" />
				</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result['productName']; ?></h2>
					
					<div class="price">
						<p>Price: <span>$<?php echo $result['price']; ?></span></p>
						<p>Category: <span><?php echo $result['catName']; ?></span></p>
						<p>Brand:<span><?php echo $result['brandName']; ?></span></p>
					</div>
					<div class="add-cart">
						<form action="" method="post">
							<input type="number" class="buyfield" name="quantity" value="1"/>
							<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
						</form>
					</div>
					
					<span style="color:red; font-size:18px;">
					</span>
                       
                    <div class="add-cart">
                    	<div class="mybutton">
						<form action="" method="post">
							<input type="hidden" class="buyfield" name="productId" value="<?php echo $result['productId']; ?>"/>							
							<input type="submit" class="buysubmit" name="compare" value="Add to Compare"/>
						</form>
						</div>
						<div class="mybutton">
						<form action="" method="post">							
							<input type="submit" class="buysubmit" name="wlist" value="Add to List"/>
						</form>
						</div>
					</div>
										
				</div>
				<div class="product-desc">
					<h2>Product Details</h2>
					<p><?php echo htmlspecialchars_decode($result['Description'], ENT_NOQUOTES); ?></p>
				</div>
				<?php
                    }
                } ?>
			</div>
			<div class="rightsidebar span_3_of_1">
				<h2>CATEGORIES</h2>
				<ul>
					<?php 
                    $getCat = $cat->getAllCat();
                    if ($getCat) {
                        while ($result = $getCat->fetch_assoc()) {
                            ?>
					<li><a href="<?php echo $result['catName'];?>.php"><?php echo $result['catName']; ?></a></li>
					<?php
                        }
                    } ?>
				</ul>
			</div>
		</div>
	</div>
<?php include 'include/footer.php'; ?>