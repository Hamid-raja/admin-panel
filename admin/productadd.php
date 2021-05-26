<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Product.php'; ?>
<?php include '../classes/Brand.php'; ?>
<?php include '../classes/Category.php'; 
      include 'test.php';
?>
<?php 
$product = new Product();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $product->productInsert($_POST, $_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">
        <?php 
         unset($insertProduct);
        if (isset($insertProduct)) {
          //  echo $insertProduct;
        }
         ?>               
         <form action="" method="post" enctype="multipart/form-data" onsubmit="updatelength('proName','errnm')">
            <table class="form">
                        <?php if (isset($insertProduct)) {
                            echo $insertProduct;
                           
                        }
                        ?>
                <tr>
                    <td>
                        <label>Name <span class="error">*</span></label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." id="proName" onKeyUp="updatelength('proName','errnm')" class="medium"  required/>
                        <p id="errnm" class="error"> </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category <span class="error">*</span></label>
                    </td>
                    <td>
                        <select id="select" name="catId" required>
                            <option value="">Select Category</option>
                            <?php 
                            $cat = new Category();
                            $getCat = $cat->getAllCat();
                            if ($getCat) {
                                while ($result = $getCat->fetch_assoc()) {
                                    ?>
                            <option value="<?php echo $result['ID']; ?>"><?php echo $result['catName']; ?></option>
                            <?php
                                }
                            } ?>                          
                        </select><a href="catadd.php" style="color: lightblue;">Add new Category</a> <span class="error" id="errcat"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Brand <span class="error">*</span></label>
                    </td>
                    <td>
                        <select id="select" name="brandId" required>
                            <option value="">Select Brand</option>
                            <?php 
                            $brand = new Brand();
                            $getBrand = $brand->getAllBrand();
                            if ($getBrand) {
                                while ($result = $getBrand->fetch_assoc()) {
                                    ?>
                            <option value="<?php echo $result['brandId']; ?>"><?php echo $result['brandName']; ?></option>
                            <?php
                                }
                            } ?>
                           
                        </select>
                    </td>
                </tr>
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description <span class="error">*</span></label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="desc" id="prodesc" onKeyUp="checkFeild('prodesc','errds')" > </textarea>
                        <p id="errds" class="error"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>SKU <span class="error">*</span></label>
                    </td>
                    <td>
                        <input type="text" name="sku" placeholder="" class="medium" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Weight <span class="error">*</span></label>
                    </td>
                    <td>
                        <input type="text" name="weight" placeholder="" class="medium" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price <span class="error">*</span></label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." id="prc" onKeyUp="isnumber('prc','errprc')" class="medium" required/>
                        <p id="errprc" class="error" ></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Quantity <span class="error">*</span></label>
                    </td>
                    <td>
                        <input type="text" name="qty" id="qty" onKeyUp="isnumber('qty','errqty')" placeholder="" class="medium" required/>
                        <p id="errqty" class="error"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Set Product as New From Date</label>
                    </td>
                    <td>
                        <input type="date" name="newFromDate" placeholder="" class="medium" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Set Product as New To Date</label>
                    </td>
                    <td>
                        <input type="date" name="newToDate" placeholder="" class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Product Status</label>
                    </td>
                    <td>
                        <select id="select" name="status" required>
                            <option value="">Select Type</option>
                            <option value="0">General</option>
                            <option value="1">Featured</option>
                            <option value="2">New</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
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