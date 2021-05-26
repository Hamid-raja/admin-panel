<?php 
    /* Update category details */
      
        include 'inc/header.php'; 
        include 'inc/sidebar.php'; 
        include '../classes/Category.php'; 
?>

<?php
    if (!isset($_GET['catid']) || $_GET['catid'] == null) {
        echo "<script>window.location = 'catlist.php';</script>";
    } else {
        $catid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['catid']);
    }

    $cat = new Category();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
        $catDesc = $_POST['catDesc'];
        //$catImg = $_POST['catImg'];
        $catStatus = $_POST['catStatus'];
        $catInMenu = $_POST['incInMenu'];
        $parent = $_POST['parent'];
        
            // File Uploading for Category    

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['catImg']['name'];
            $file_size = $_FILES['catImg']['size'];
            $file_temp = $_FILES['catImg']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "catimg/".$unique_image;

            if(isset($file_name)){
                $file_name=$_POST['image'];
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                //$unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = $file_name;
            }

            if (empty($file_name)) {
                echo "<span class='error'>Please Select any Image !</span>";
            } elseif ($file_size >4048567) {
                echo "<span class='error'>Image Size should be less then 4MB! </span>";
            } elseif (in_array($file_ext, $permited) === false) {
                echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
            }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $updatetCat= $cat->catUpdate($catName,$catDesc,$uploaded_image,$catStatus,$catInMenu,$catid,$parent);
            }
    }
    ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock">
               <?php 
                    if (isset($updatetCat)) {
                        echo $updatetCat;
                    }
                ?>
                
                <?php 
                $getCat = $cat->getCatById($catid);
                if ($getCat) {
                    while ($result = $getCat->fetch_assoc()) {
                        ?> 
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">                    
                        <tr>
                            <td> Category Name </td>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." value=<?php echo $result['catName']; ?> name="catName" id="catName" onKeyUp="updatelength('catName','info')" class="medium" />
                                <p id="info" style="color:red;"></p>
                            </td>
                        </tr>
                        <tr>
                            <td> Category Description</td>
                            <td>
                                <textarea name="catDesc" class="medium" cols="25" rows="4" id="desc" onKeyUp="checkFeild('desc','errdesc')"  ><?php echo $result['Description']; ?> </textarea>
                                <p id="errdesc" class="error"></p>
                            </td>
                        </tr> 
                        <tr>
                            <td> Category Image</td>
                            <td>
                                <img src =<?php echo $result['image']; ?> height="80px" width="200px" ></img>
                                <input type="hidden" name= "image" value=<?php echo $result['image']; ?> />
                                <input type="file" name="catImg"   >
                            </td>
                        </tr>
                        <tr>
                            <td> Status</td>
                            <td>
                                
                                <select name="catStatus" class="medium">
                                    <option value="1" <?php if($result['status']== "1"){ echo "Selected"; }   ?>  >Enable</option>
                                    <option value="0" <?php if($result['status']== "0"){ echo "Selected"; }   ?>  >Disable</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td> Include In Menu </td>
                            <td>
                                <select name="incInMenu" class="medium">
                                    <?php 
                                        if($result['inc_menu']== "No")
                                    ?>
                                    <option value="No" <?php if($result['inc_menu']== "No"){ echo "Selected"; }   ?>  >NO</option>
                                    <option value="Yes" <?php if($result['inc_menu']== "Yes"){ echo "Selected"; }   ?>  >YES</option>
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
                                            while ($res = $getCat->fetch_assoc()) {
                                    ?>
                                    <option value="<?php echo $res['catName']; ?>" <?php if($result['parentid']==$res['ID']){ echo "Selected"; } ?>><?php echo $res['catName'];  ?></option>
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
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }
                } ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>
