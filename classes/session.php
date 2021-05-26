<?php
/**
 *Session Class
 **/
class Session
{

    /*
    * start session
    */
    public static function init()
    {
        // if php version is < 5.4
        if (version_compare(phpversion(), '5.4.0', '<')) {
            if (session_id() == '') {
                session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
        }
    }

    /**
     * Set sessoin 
     * @param : $key
     * @param : $val
     */

    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    /**
     * check session set or not using key
     * @param : $key
     */

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    /**
     * check sessions set or not
     */
    
    public static function checkSession()
    {
        self::init();
        if (self::get("adminlogin") == false) {
            self::destroy();
            header("Location:login.php");
        }
    }

     /**
     * check login session and redirect dashboard
     */

    public static function checkLogin()
    {
        self::init();
        if (self::get("adminlogin") == true) {
            header("Location:admin\dashboard.php");
        }
    }

     /**
     * destroy session at logout
     */
    public static function destroy()
    {
        session_destroy();
        echo "<script>window.location = 'login.php';</script>";
        
    }
}
