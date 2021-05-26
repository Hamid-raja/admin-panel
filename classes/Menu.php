<?php 
$filepath = realpath(dirname(__FILE__));
//include($filepath.'/../classes/session.php');
Session::checkLogin();
include_once($filepath.'/../classes/Database.php');

 ?>
<?php
/**
 * Menu Class
 */
class Menu
{
    private $db;
   
    public function __construct()
    {
        $this->db = new Database();
    }

    /**
     * insert menu
     * @param $Name $path $isActive
     */
   
    public function addMenu($Name,$path,$isActive,$parentid)
    {        
            $query = "INSERT INTO tbl_menu values(NULL,$Name,$path,$isActive,$parentid)";
            $menuInsert = $this->db->insert($query);
            
            if ($menuInsert) {
                $msg = "<span class='success'>Menu Inserted Successfully</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Category Not Inserted.</span>";
                return $msg;
            }
    }

    /**
     * Fetch Menu
     */
    
     public function getMenu()
    {
        
            $query = "SELECT * FROM tbl_menu WHERE isActive=1 and parentid=0";
            $result = $this->db->select($query);
            
            return $result;
    }

    /**
     * Fetch Menu by  name
     */
    
    public function getMenuByname($name)
    {
        
            $query = "SELECT * FROM tbl_menu WHERE name='$name'";
            $result = $this->db->select($query);
            
            return $result;
    }

    /**
     * Check menu have any child menu
     */
    
    public function checkChildMenu($id)
    {
        
            $query = "SELECT * FROM tbl_menu WHERE parentid='$id' and isActive=1";
            $result = $this->db->select($query);
        
            return $result;
    }
}
