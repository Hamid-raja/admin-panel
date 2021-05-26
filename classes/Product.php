<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../classes/Database.php');
include_once($filepath.'/../classes/Format.php');
 ?>
<?php 

class Product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();  //create object of classes
        $this->fm = new Format();
    }

    /**
     * Product insert
     * @param: $data $file
     */

    public function productInsert($data, $file)
    {
        $productName = $this->fm->validation($data['productName']);
        $catId       = $this->fm->validation($data['catId']);
        $brandId     = $this->fm->validation($data['brandId']);
        $desc        = $this->fm->validation($data['desc']); //Description
        $sku         = $this->fm->validation($data['sku']);
        $weight      = $this->fm->validation($data['weight']);
        $price       = $this->fm->validation($data['price']);
        $qty         = $this->fm->validation($data['qty']);
        $newFromDate = $this->fm->validation($data['newFromDate']);
        $newToDate   = $this->fm->validation($data['newToDate']);
        $status      = $this->fm->validation($data['status']);

        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $catId       = mysqli_real_escape_string($this->db->link, $catId);
        $brandId     = mysqli_real_escape_string($this->db->link, $brandId);
        $desc        = mysqli_real_escape_string($this->db->link, $desc);
        $sku         = mysqli_real_escape_string($this->db->link, $sku);
        $weight      = mysqli_real_escape_string($this->db->link, $weight);
        $price       = mysqli_real_escape_string($this->db->link, $price);
        $qty         = mysqli_real_escape_string($this->db->link, $qty);
        $newFromDate = mysqli_real_escape_string($this->db->link, $newFromDate);
        $newToDate   = mysqli_real_escape_String($this->db->link, $newToDate);
        $status      = mysqli_real_escape_string($this->db->link, $status);

        if($catId==-1){
            $msg="<script>document.getElementById(errcat).innerHTML = 'Selection reuired'</script>";
            return $msg;
        }

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if (empty($file_name)) {
            echo "<span class='error'>Please Select any Image !</span>";
        } elseif ($file_size >4048567) {
            echo "<span class='error'>Image Size should be less then 4MB! </span>";
        } elseif (in_array($file_ext, $permited) === false) {
            echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
        } elseif ($productName == "" || $catId == "" || $brandId == "" || $desc == "" || $sku == "" || $weight == ""  || $price == "" || $qty == "" || $newFromDate == "" || $newToDate == "" || $status == "") {
            $msg = "<span class='error'>Fields must not be empty!</span>";
            return $msg;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product VALUES(NULL,'$productName', '$catId','$catId', '$brandId', '$desc', '$sku', '$weight', '$price', '$qty', '$uploaded_image', '$newFromDate', '$newToDate', '$status')";
            $inserted_row = $this->db->insert($query);
            if ($inserted_row) {
                $msg = "<span class='success'>Product Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Product Not Inserted.</span>";
                return $msg;
            }
        }
    }

    /**
     * Fetch All Products Detail
     */
    
    public function getAllProduct()
    {
        $query = "SELECT p.*, c.catName, b.brandName
                    FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
                    WHERE p.catId = c.Id AND p.brandId = b.brandId
                    ORDER BY p.productId DESC";
        /*$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName
            FROM tbl_product
            INNER JOIN tbl_category
            ON tbl_product.catId = tbl_category.ID
            INNER JOIN tbl_brand
            ON tbl_product.brandId = tbl_brand.brandId
            ORDER BY tbl_product.productId DESC";
            */
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Get product by id
     * @param: $proid
     */
    public function getProById($proid)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = '$proid'";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * update product Detail
     * @param: $data
     * @param: $file
     * @param: $proid
     */

    public function productUpdate($data, $file, $proid)
    {
        $productName = $this->fm->validation($data['productName']);
        $catId       = $this->fm->validation($data['catId']);
        $brandId     = $this->fm->validation($data['brandId']);
        $desc        = $this->fm->validation($data['desc']); //Description
        $sku         = $this->fm->validation($data['sku']);
        $weight      = $this->fm->validation($data['weight']);
        $price       = $this->fm->validation($data['price']);
        $qty         = $this->fm->validation($data['qty']);
        $newFromDate = $this->fm->validation($data['newFromDate']);
        $newToDate   = $this->fm->validation($data['newToDate']);
        $status      = $this->fm->validation($data['status']);

        $productName = mysqli_real_escape_string($this->db->link, $productName);
        $catId       = mysqli_real_escape_string($this->db->link, $catId);
        $brandId     = mysqli_real_escape_string($this->db->link, $brandId);
        $desc        = mysqli_real_escape_string($this->db->link, $desc);
        $sku         = mysqli_real_escape_string($this->db->link, $sku);
        $weight      = mysqli_real_escape_string($this->db->link, $weight);
        $price       = mysqli_real_escape_string($this->db->link, $price);
        $qty         = mysqli_real_escape_string($this->db->link, $qty);
        $newFromDate = mysqli_real_escape_string($this->db->link, $newFromDate);
        $newToDate   = mysqli_real_escape_String($this->db->link, $newToDate);
        $status      = mysqli_real_escape_string($this->db->link, $status);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if($newFromDate=="" && $newToDate==""){
            $newFromDate=NULL;
            $newToDate=NULL;
        }
        if ($productName == "" || $catId == "" || $brandId == "" || $desc == "" || $sku == "" || $weight == "" || $price == "" || $qty == "" || $newFromDate == "" || $newToDate == "" || $status == "") {
            $msg = "<span class='error'>Fields must not be empty!</span>";
           // echo "$productName  || $catId  || $brandId  || $desc  || $sku || $weight || $price  || $qty || $newFromDate || $newToDate  || $status";
            return $msg;
        } else {
            if (!empty($file_name)) {

                 // upadate product with image upload
                if ($file_size >4048567) {
                    echo "<span class='error'>Image Size should be less then 4MB! </span>";
                } elseif (in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else {
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_product
                                SET
                                productName   ='$productName',
                                catId         ='$catId',
                                brandId       ='$brandId',
                                Description   ='$desc',
                                sku           ='$sku',
                                weight        ='$weight',
                                price         ='$price',
                                qty           ='$qty',
                                image         ='$uploaded_image',
                                new_from_date ='$newFromDate',
                                new_to_date   ='$newToDate',
                                status        ='$status'
                                WHERE productId = '$proid'
                                ";
                    $updated_row = $this->db->update($query);
                    if ($updated_row) {
                        $msg = "<span class='success'>Product Updated Successfully</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Product Not Updated.</span>";
                        return $msg;
                    }
                }
            } else {

                //update product without image upload
                $query = "UPDATE tbl_product
                                SET
                                productName    ='$productName',
                                catId          ='$catId',
                                brandId        ='$brandId',
                                Description    ='$desc',
                                sku            ='$sku',
                                weight         ='$weight',
                                price          ='$price',
                                qty            ='$qty',
                                new_from_date  ='$newFromDate',
                                new_to_date    ='$newToDate',
                                status         ='$status'
                                WHERE productId = '$proid'
                                ";
                $updated_row = $this->db->update($query);
                if ($updated_row) {
                    $msg = "<span class='success'>Product Updated Successfully</span>";
                    return $msg;
                } else {
                    $msg = "<span class='error'>Product Not Updated.</span>";
                    return $msg;
                }
            }
        }
    }

    /**
     * Delete Product By ID
     * @param : $id
     */
    public function delProById($id)
    {
        $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
        $getData = $this->db->select($query);
        if ($getData) {
            // Unlink\Delete image 
            while ($delImg = $getData->fetch_assoc()) {
                $dellink = $delImg['image'];
                unlink($dellink);
            }
        }
        $delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
        $deldata = $this->db->delete($delquery);
        if ($deldata) {
            $msg = "<span class='success'>Product Deleted Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Product Not Deleted!</span>";
            return $msg;
        }
    }

    /**
     * Get Feature Products
     */

    public function getFeaturedProduct()
    {
        $query = "SELECT * FROM tbl_product WHERE status = '1' ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Get New Products
     */

    public function getNewProduct()
    {
        $query = "SELECT * FROM tbl_product where new_from_date < Now() And new_to_date > NOW() or status=2 ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * get new product by status
     */
    public function getNewProductByStatus()
    {
        $query = "SELECT * FROM tbl_product where status=2 ORDER BY productId DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Get Signle Product 
     */
    public function getSingleProduct($proId)
    {
        $query = "SELECT p.*, c.catName, b.brandName
                    FROM tbl_product AS p, tbl_category AS c, tbl_brand AS b
                    WHERE p.catId = c.ID AND p.brandId = b.brandId AND p.productId = '$proId'";
        
        $result = $this->db->select($query);
        return $result;
    }

    public function latestFromIphone()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '3' ORDER BY productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestFromSamsung()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '1' ORDER BY productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestFromAcer()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '5' ORDER BY productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    public function latestFromCanon()
    {
        $query = "SELECT * FROM tbl_product WHERE brandId = '4' ORDER BY productId DESC LIMIT 1";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Get product by categories
     * @param: $catId
     */
    public function productByCat($catId)
    {
        $catId  = mysqli_real_escape_string($this->db->link, $catId);
        $query  = "SELECT * FROM `tbl_product` WHERE LOCATE('$catId',catids)>0";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * add category id
     * @param $catid $proid
     */

    public function addCatId($proid, $catid){
        $proid  = mysqli_real_escape_string($this->db->link, $proid);
        $catid  = mysqli_real_escape_string($this->db->link, $catid);

        $select_query = "SELECT * from tbl_product WHERE productId='$proid'";
        $chek_catid   = $this->db->select($select_query);
        $result = $chek_catid->fetch_assoc();
        
        if($result['catids']==""){
            $query = $query = "UPDATE tbl_product
                            SET
                            catids   = '$catid'
                            WHERE productId = '$proid'
                            ";
        }else{
            if(strpos($result['catids'],$catid) === false){
                $query = $query = "UPDATE tbl_product
                            SET
                            catids   = concat(catids,',$catid')
                            WHERE productId = '$proid'
                            ";
            }else{
                $msg = "<span class='success'>product already avialble</span>";
                return $msg;
            }
        }
        $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = "<span class='success'>Product Added Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Product Not Updated.".$this->$db -> errno."</span>";
                return $msg;
            }
    }

    /**
     * remove category id
     * @param $catid $proid
     */
    
    public function removeCatId($proid, $catid){
        $proid  = mysqli_real_escape_string($this->db->link, $proid);
        $catid  = mysqli_real_escape_string($this->db->link, $catid);

        $select_query = "SELECT * from tbl_product WHERE productId='$proid'";
        $chek_catid   = $this->db->select($select_query);
        $result = $chek_catid->fetch_assoc();
      
        //SELECT replace(catids , ',6','') FROM `tbl_product` WHERE LOCATE('6',catids)>0
        //SELECT * FROM `tbl_product` WHERE LOCATE('6',catids)>0 and CHAR_LENGTH(catids)>1
       
        if(strpos($result['catids'],$catid)==0){

            $query = $query = "UPDATE tbl_product
                            SET
                            catids   = replace(catids , '$catid','')
                            WHERE productId = '$proid'
                            ";
        }else{
            $query = $query = "UPDATE tbl_product
                            SET
                            catids   = replace(catids , ',$catid','')
                            WHERE productId = '$proid'
                            ";
        }
        $updated_row = $this->db->update($query);
            if ($updated_row) {
                $msg = "<span class='success'>Product removed Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Product Not removed.</span>";
                return $msg;
            }
    }
}
