<?php 
	include 'include/header.php';
	$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
	$Page= explode('.',$curPageName);
?>

 <div class="main">
    <div class="content">

	<div class="content_top">
    		<div class="heading" style="padding-left : 40%">
    		<h3><?php echo $Page[0]; ?> </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
              /**
               * category display
               */

              $getCat = $cat->getCatByName($Page[0]);
              if ($getCat) {
                  while ($result = $getCat->fetch_assoc()) {
                      ?>
				<div class="">
					 <a href="details.php?proId=<?php //echo $result['Id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php //echo $result['catName']; ?></h2>
					 <p><?php //echo $fm->textShorten($result['Description'], 40); ?></p>
				    
				</div>
				<?php
				$catId= $result['ID'];
                  }
				 // echo $catId;
              } ?>

			</div>

    	<div class="content_top">
    		<div class="heading">
    		<h3>Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
			
              /**
               * Display Product using Cat Id 
               */

              $getPd = $pd->productByCat($catId);
              if ($getPd) {
                  while ($result = $getPd->fetch_assoc()) {
                      ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $fm->textShorten($result['Description'], 40); ?></p>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php
                  }
              }else{
				  Echo "No products available";
			  } ?>

			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			
            <?php 
                /**
                 * Display New Product 
                 */
              $getNpd = $pd->getNewProduct();
              if ($getNpd) {
                  while ($result = $getNpd->fetch_assoc()) {
            ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Add To Cart</a></span></div>
				</div>
				
			<?php
                  }
				  $num=$getNpd->num_rows;
				if($num < 0) {
					$getNew= $pd->getNewProductByStatus();
                  while ($result = $getNew->fetch_assoc()) {
            ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proId=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><span class="price">$<?php echo $result['price']; ?></span></p>
				     <div class="button"><span><a href="details.php?proId=<?php echo $result['productId']; ?>" class="details">Add To Cart</a></span></div>
				</div>
				
				<?php
                  }
				}
              } ?>
				
			</div>
    </div>
 </div>

<?php include 'include/footer.php'; ?>
