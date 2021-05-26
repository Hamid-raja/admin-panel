<?php 
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/../configuration/config.php');
?>
<?php
class Database
{

    /* 
    * get configuartion for DB connection 
    */
    public $host   = DB_HOST;
    public $user   = DB_USER;
    public $pass   = DB_PASS;
    public $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectionDB();
    }

    /**
     * Established DB connection
     */
    private function connectionDB()
    {
        $this->link = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );
        if (!$this->link) {
            $this->error = "Connection fail" . $this->link->connect_error;
            return false;
        }
    }

    /**
     * Return result of select query
     * OPRATION: Select/Read
     * @param : $query 
     */
    public function select($query)
    {
        $result = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    /**
     * insert data
     * OPRATION: Insert
     * @param : $query 
     */
    public function insert($query)
    {
        $insert_row = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            return false;
        }
    }

    /**
     * Update data
     * OPRATION: update
     * @param : $query 
     */
    public function update($query)
    {
        $update_row = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if ($update_row) {
            return $update_row;
        } else {
            return false;
        }
    }

    /**
     * Delete data
     * OPRATION: Delete
     * @param : $query 
     */
    public function delete($query)
    {
        $delete_row = $this->link->query($query) or
        die($this->link->error . __LINE__);
        if ($delete_row) {
            return $delete_row;
        } else {
            return false;
        }
    }
}
