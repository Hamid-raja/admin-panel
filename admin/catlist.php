<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Category.php'; ?>
<?php 
    // Category List 
    $cat = new Category();
    $fm = new Format();
    if (isset($_GET['delcat'])) {
        $id = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['delcat']);
        $delCat = $cat->delCatById($id);
    }
 ?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">
                <?php 
                if (isset($delCat)) {
                    echo $delCat;
                }
                 ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
                            <th>ID</th>
							<th>Category Name</th>
                            <th>Category Description</th>
                            <th>Image</th>
							<th>Status</th>
                            <th>Include In Menu</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php 
                        $getCat = $cat->getAllCat();
                        if ($getCat) {
                            $i=0;
                            while ($result = $getCat->fetch_assoc()) {
                                $i++; ?>
						<tr class="odd gradeX">
                            
							<td><?php echo $i; ?></td>
							<td><?php echo $result['ID']; ?></td>
                            <td><?php echo $result['catName']; ?></td>
                            <td><?php echo $fm->textShorten($result['Description'],20); ?></td>
                            <td><img src="<?php echo $result['image']; ?>" height="40px" width="60px"></td>	
                            <td><?php if($result['status']==1) { echo "Enable";} else{echo "Disable";}; ?></td>
                            <td><?php echo $result['inc_menu']; ?></td>
							<td><a href="catedit.php?catid=<?php echo $result['ID']; ?>">Edit</a> || <a onclick="return confirm('Are you sure to delete this?')" href="?delcat=<?php echo $result['ID']; ?>">Delete</a></td>
						</tr>
						<?php
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

