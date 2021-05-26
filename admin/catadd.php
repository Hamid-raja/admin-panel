<?php 

// Add new Category for Prodcut Ecommerce Site

 include 'inc/header.php'; 
 include 'inc/sidebar.php'; 
 include '../classes/Category.php';
 //include '../classes/Menu.php';
?>

<?php 
$cat = new Category();
//$mn =  new Menu();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $catName = $_POST['catName'];
    $catDesc = $_POST['catDesc'];
    
    $catStatus = $_POST['catStatus'];
    $catInMenu = $_POST['incInMenu'];
    $parent = $_POST['parent'];
    
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['catImg']['name'];
        $file_size = $_FILES['catImg']['size'];
        $file_temp = $_FILES['catImg']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "catimg/".$unique_image;

        if (empty($file_name)) {
            echo "<span class='error'>Please Select any Image !</span>";
        } elseif ($file_size >4048567) {
            echo "<span class='error'>Image Size should be less then 4MB! </span>";
        } elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
        }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $insertCat= $cat->catInsert($catName,$catDesc,$uploaded_image,$catStatus,$catInMenu,$parent);
        }
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">
               <?php 
               if (isset($insertCat)) {
                   echo $insertCat;
               }
                ?> 
                 <form action="" method="post" enctype="multipart/form-data" onsubmit="">
                    <table class="form">                    
                        <tr>
                            <td> Category Name </td>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." name="catName" id="catName" onKeyUp="updatelength('catName','err')" class="medium" required />
                                <p id='err' class="error"></p>
                            </td>
                        </tr>
                        <tr>
                            <td> Category Description</td>
                            <td>
                                <textarea name="catDesc" class="medium" cols="25" rows="4" id="desc" onKeyUp="checkFeild('desc','errdesc')" placeholder="Category Description" > </textarea>
                                <p id="errdesc" class="error"></p>
                            </td>
                        </tr>
                        <tr>
                            <td> Category Image</td>
                            <td>
                                <input type="file" name="catImg" >
                            </td>
                        </tr>
                        <tr>
                            <td> Status</td>
                            <td>
                               
                                <select name="catStatus" class="medium">
                                    <option value="0" selected>Disable</option>
                                    <option value="1" >Enable</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> Include In Menu </td>
                            <td>
                                <select name="incInMenu" class="medium">
                                    <option value="No" selected>NO</option>
                                    <option value="Yes" >YES</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> Parent Category (optional)</td>
                            <td>
                                <select name="parent" class="medium">
                                    <option value="none" selected>Default</option>
                                    <?php
                                       // $cat = new Category();
                                        $getCat = $cat->getAllCat();
                                        if ($getCat) {
                                            while ($result = $getCat->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $result['catName']; ?>"><?php echo $result['catName'];  ?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr> 
                            <td></td>
                            <td colspan="2">
                                <input type="submit" class="button" style="Background-color: #2E5E79;color: white;" name="submit" Value="Save Category" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
