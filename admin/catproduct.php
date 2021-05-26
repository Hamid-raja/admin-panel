<?php 
 include 'inc/header.php';
 include '../classes/Product.php'; 
 include '../classes/Category.php'; 
 include_once '../classes/Format.php'; 
 include 'inc/sidecat.php';

	$pd = new Product();
	$fm = new Format();
  
	if(isset($_GET['catid'])){
		$catid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
		$_SESSION['catid'] = $catid;
	}else{
		if(isset($_SESSION['catid'])){
			$catid = $_SESSION['catid'];
		}else{
			$catid = 1;
		}
	}

	if(isset($_GET['addCat'])){
		$getinf= explode(',',$_GET['addCat']);
	// echo $getinf[0],$getinf[1];

		$catAdd= $pd->addCatId($getinf[0],$getinf[1]);
	}

	if(isset($_GET['catremove'])){
		$getinf= explode(',',$_GET['catremove']);
		//echo $getinf[0],$getinf[1];

		$catAdd= $pd->removeCatId($getinf[0],$getinf[1]);
	}	
 ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Category Products</h2>
        <?php 
                if (isset($catAdd)) {
                    echo $catAdd;
                }
                 ?>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Sl</th>
					<th>Product Name</th>
					
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
                $getPd = $pd->getAllProduct();
                if ($getPd) {
                    $i=0;
                    while ($result = $getPd->fetch_assoc()) {
                      
                        if(strpos($result['catids'],"$catid" ) !== false)
                        {
                        $i++; ?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					
					<td><?php echo $fm->textShorten(htmlspecialchars_decode($result['Description'], ENT_NOQUOTES), 50); ?></td>
					<td>$<?php echo $result['price']; ?></td>
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>					
					<td>
						<?php 
                        
                        if ($result['status']==1) {
                            echo "Featured";
                        } else if ($result['status']==0){
                            echo "General";
                        } 
						else{
							echo "New";
						}?>
							
						</td>					
					<td><a onclick="return confirm('Are you sure to Remove this Product from Category?')" href="?catremove=<?php echo $result['productId'].','.$catid; ?>">Remove</a></td>
				</tr>
				<?php
                        }
                        
                    }
                } ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Other Products</h2>
        <div class="block">  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>Sl</th>
					<th>Product Name</th>
					<th>Category</th>
					<th>Brand</th>
					<th>Description</th>
					<th>Price</th>
					<th>Image</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
                $getPd = $pd->getAllProduct();
                if ($getPd) {
                    $i=0;
                    while ($result = $getPd->fetch_assoc()) {
                      
                        if(strpos($result['catids'],"$catid" ) === false)
                        {
                          
                        $i++; ?>
                        
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName']; ?></td>
					<td><?php echo $result['catName']; ?></td>
					<td><?php echo $result['brandName']; ?></td>
					<td><?php echo $fm->textShorten(htmlspecialchars_decode($result['Description'], ENT_NOQUOTES), 50); ?></td>
					<td>$<?php echo $result['price']; ?></td>
					<td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>					
					<td>
						<?php 
                        
                        if ($result['status']==1) {
                            echo "Featured";
                        } else if ($result['status']==0){
                            echo "General";
                        } 
						else{
							echo "New";
						}?>
							
						</td>					
					<td><a onclick="return confirm('Are you sure add in category?')" href="?addCat=<?php echo $result['productId'].','.$catid; ?>">Add</a></td>
				</tr>
				<?php
                      }
                    }
                } ?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
