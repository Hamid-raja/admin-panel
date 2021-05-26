<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../classes/Database.php');
include_once($filepath.'/../classes/Format.php');
//include_once($filepath.'/../classes/Menu.php');
 ?>
<?php 
class Category
{
    private $db;
    private $fm;
    //private $mn;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
       // $this->mn = new Menu();
    }

    /**
     * Category insert
     * @param $catName $catDesc $catImg $catStatus $catInMenu
     */

    public function catInsert($catName,$catDesc,$catImg,$catStatus,$catInMenu,$parent)
    {
        $catName = $this->fm->validation($catName);
        $catDesc = $this->fm->validation($catDesc);
        $catStatus = $this->fm->validation($catStatus);
        $catInMenu = $this->fm->validation($catInMenu);
        $parent = $this->fm->validation($parent);

        if($parent == 'none'){
            $parentid=0;
        }else{
            $getMenuid="SELECT * FROM tbl_menu WHERE name='$parent'";
            $resMenu= $this->db->select($getMenuid); 
            if($resMenu){
            while($res = $resMenu->fetch_assoc()){
                   $parentid = $res['id'];
            }
         }
        }

        $catName = mysqli_real_escape_string($this->db->link, $catName);
        if (empty($catName) || empty($catDesc) || empty($catStatus) || empty($catInMenu) || empty($parent)) {
            $msg = "<span class='error'>Category field must not be empty!</span>";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_category VALUES(NULL,'$catName','$catDesc','$catImg',$catStatus,'$catInMenu','$parentid')";
            $catinsert = $this->db->insert($query);
            
            // category added in menu and generate uniq file 
            if($catInMenu=="Yes"){
                $catFile = '../'. $catName.".php"; // or .php   
                $file = fopen($catFile, 'w') or die("error");  
                $stringData = "<?php include 'page.php'; ?>";   
                fwrite($file, $stringData);
                fclose($file);
                $link = $catName.".php";
                    $menuQuery="INSERT INTO tbl_menu values(NULL,'$catName','$link',1,'$parentid')";
                    $insertMenu= $this->db->insert($menuQuery);
            }
            else{
                $catFile = '../'. $catName.".php"; // or .php   
                $file = fopen($catFile, 'w') or die("error");  
                $stringData = "<?php include 'page.php';?>";   
                fwrite($file, $stringData);
                fclose($file);
                $link = $catName.".php";
                    $menuQuery="INSERT INTO tbl_menu values(NULL,'$catName','$link',0,'$parentid')";
                    $insertMenu= $this->db->insert($menuQuery);
            }

            if ($catinsert) {
                $msg = "<span class='success'>Category Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Category Not Inserted.</span>";
                return $msg;
            }
        }
    }

    /**
     * Get All Categories
     */

    public function getAllCat()
    {
        $query = "SELECT * FROM tbl_category ORDER BY ID";
        $result = $this->db->select($query);
        return $result;
    }

     /**
     * Get Catefgories By Name
     */

    public function getCatByName($catName)
    {
        $query = "SELECT * FROM tbl_category WHERE catName = '$catName'";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Get Categories By ID
     */

    public function getCatById($catid)
    {
        $query = "SELECT * FROM tbl_category WHERE Id = '$catid'";
        $result = $this->db->select($query);
        return $result;
    }

    /**
     * Category update
     * @param $catName $catDesc $uploaded_image $catStatus $catInMenu $catid
     */

    public function catUpdate($catName,$catDesc,$uploaded_image,$catStatus,$catInMenu,$catid,$parent)
    {
        $catName    = $this->fm->validation($catName);
        $catDesc    = $this->fm->validation($catDesc);
        $catStatus  = $this->fm->validation($catStatus);
        $catInMenu  = $this->fm->validation($catInMenu);
        $catId      = $this->fm->validation($catid);
        $parent     = $this->fm->validation($parent);

        $catName   = mysqli_real_escape_string($this->db->link, $catName);
        $catDesc   = mysqli_real_escape_string($this->db->link, $catDesc);
        $catStatus = mysqli_real_escape_string($this->db->link, $catStatus);
        $catInMenu = mysqli_real_escape_string($this->db->link, $catInMenu);
        $catid     = mysqli_real_escape_string($this->db->link, $catid);
        
        if($parent == 'none'){
            $parentid='0';
        }else{
         
            // varify the parent id is available or not

            $getMenuid="SELECT * FROM tbl_menu WHERE name='$parent'";
            $resMenu= $this->db->select($getMenuid); 
            if($resMenu){
            while($res = $resMenu->fetch_assoc()){
                   $parentid = $res['id'];
            }
          }
        }

        if (empty($catName) || empty($catDesc) || empty($catInMenu) || empty($catid) || empty($uploaded_image) || empty($catid) ) {
            $msg = "<span class='error'>Category field must not be empty!</span>";//.$catName.$catDesc.$uploaded_image.$catStatus.$catInMenu.$catid.$parentid;
            return $msg;
        } else {
            $query = "UPDATE tbl_category
        	SET
        	catName = '$catName',
            Description = '$catDesc',
            image = '$uploaded_image',
            status = '$catStatus',
            inc_menu = '$catInMenu',
            parentid = '$parentid' 
        	WHERE ID = '$catid'";
            $updated_row = $this->db->update($query);

                $catFile = '../'. $catName.".php"; // or .php   
                $file = fopen($catFile, 'w') or die("error");  
                $stringData = "<?php include 'page.php'; ?>";   
                fwrite($file, $stringData);
                fclose($file);
                $link = $catName.".php";
                   // $menuQuery="INSERT INTO tbl_menu values(NULL,'$catName','$link',1,'$parentid')";
                   // $menuQuery="UPDATE tbl_menu SET catName='$catName', link ='$link',status = '$catStatus', parentid = '$parentid' WHERE id= '$catId'";
                   // $insertMenu= $this->db->insert($menuQuery);
            
            if ($updated_row) {
                $msg = "<span class='success'>Category Updated Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Category Not Updated.</span>";
                return $msg;
            }
        }
    }

    /**
     * Delete Category by id
     * @param $id
     */
    
    public function delCatById($id)
    {
        // $id = mysqli_real_escape_string($this->db->link, $id);
        $query = "DELETE FROM tbl_category WHERE Id = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>Category Deleted Successfully</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Category Not Deleted!</span>";
            return $msg;
        }
    }
}
