<?php include 'inc/header.php'; // contain object of classes?>
<?php include 'inc/sidebar.php';  ?>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Brand.php'; ?>
<?php include '../classes/Category.php'; ?>
<?php
if (!isset($_GET['proid']) || $_GET['proid'] == null) {
    echo "<script>window.location = 'productlist.php';</script>";
} else {
    $proid = preg_replace('/[^-a-zA-Z0-9_]/', '', $_GET['proid']);
}
$pd = new Product();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    //call function to update product
    $updateProduct = $pd->productUpdate($_POST, $_FILES, $proid);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div class="block">
        <?php 
        if (isset($updateProduct)) {
            echo $updateProduct;
        }
         ?>
         <?php 
         $getPro = $pd->getProById($proid);
         if ($getPro) {
             while ($value = $getPro->fetch_assoc()) {
                 ?>               
         <form action="" method="post" enctype="multipart/form-data" onsubmit="">
            <table class="form">
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" value="<?php echo $value['productName'] ?>" id="proName" onKeyUp="updatelength('proName','errnm')" class="medium" />
                        <p id="errnm" class="error"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                                $cat = new Category();
                                $getCat = $cat->getAllCat();
                                if ($getCat) {
                                    while ($result = $getCat->fetch_assoc()) {
                            ?>
                            <option 
                                <?php 
                                if ($value['catId'] == $result['ID']) {
                                    ?>       
                                    selected = "selected"
                                <?php
                                } ?>
                                value="<?php echo $result['ID']; ?>"><?php echo $result['catName']; ?></option>
                            <?php
                     }
                 } ?>  
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId" required>
                            <option>Select Brand</option>
                            <?php 
                            $brand = new Brand();
                            $getBrand = $brand->getAllBrand();
                            if ($getBrand) {
                                while ($result = $getBrand->fetch_assoc()) {
                                    ?>
                                        <option 
                                        <?php 
                                        if ($value['brandId'] == $result['brandId']) {
                                            ?>
                                            selected = "selected"
                                        <?php
                                        } ?>
                                        value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
                                        <?php
                                }
                            } ?>
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="desc" id="prodesc" onKeyUp="checkFeild('prodesc','errds')" required><?php echo $value['Description'] ?></textarea>
                        <p id="errds" class="error"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>SKU</label>
                    </td>
                    <td>
                        <input type="text" name="sku" value="<?php echo $value['sku'] ?>" class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Weight</label>
                    </td>
                    <td>
                        <input type="text" name="weight" value="<?php echo $value['weight'] ?>" class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td id="price">
                        <input type="text" name="price" value="<?php echo $value['price'] ?>" id="prc" onKeyUp="isnumber('prc','errprc')" class="medium" required/>
                        <p id="errprc" class="error"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Quantity</label>
                    </td>
                    <td>
                        <input type="text" name="qty" value="<?php echo $value['qty'] ?>" id="qty" onKeyUp="isnumber('qty','errqtt')" class="medium" required/>
                        <p id="errqtt" class="error"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $value['image']; ?>" height="80px" width="200px"><br>
                        <input type="file" name="image" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Set Product as New From Date</label>
                    </td>
                    <td>
                        <input type="date" name="newFromDate" placeholder="" value="<?php echo $value['new_from_date'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Set Product as New To Date</label>
                    </td>
                    <td>
                        <input type="date" name="newToDate" value="<?php echo $value['new_to_date'] ?>" placeholder="" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Product Status <p class="error" id="errst"></p></label>
                    </td>
                    <td>
                        <select id="select" name="status">
                            <option selsected>Select status</option>
                            <option value="0" <?php if ($value['status'] == 0) { echo "Selected"; }?>>General</option>
                            <option value="1" <?php if ($value['status'] == 1) { echo "Selected"; }?>>Feature</option>
                            <option value="2" <?php if ($value['status'] == 2) { echo "Selected"; }?>>New</option>    
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" class="button" name="submit" Value="Update" />
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
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


