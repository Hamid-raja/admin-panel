<?php 

/**
 * include Required classes
 */
include 'classes/session.php';
Session::init();
include 'classes/Database.php';
include 'classes/Format.php';

//include 'classes/Cart.php';

spl_autoload_register(function ($class) {
    include_once "classes/".$class.".php";
});
    $db = new Database();
    $fm = new Format();
    $pd = new Product();
  
    $cat = new Category();
    $navmenu= new Menu();
   
?>

<!DOCTYPE HTML>
  <head>
      <title>Ahi Store</title>

      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
     
      <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
      <link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
      
      <script src="js/jquerymain.js"></script>
      <script src="js/script.js" type="text/javascript"></script>
      <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
      <script type="text/javascript" src="js/nav.js"></script>
      <script type="text/javascript" src="js/move-top.js"></script>
      <script type="text/javascript" src="js/easing.js"></script> 
      <script type="text/javascript" src="js/nav-hover.js"></script>
      
      <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
      <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
      
      <script type="text/javascript">
        $(document).ready(function($){
          $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
        });
      </script>
  </head>
  
<body>
  <div class="wrap">
    <div class="header_top">
      <div class="logo">
        <a href="index.php"><img src="images/logo.png" alt="" /></a>
      </div>
      <div class="header_top_right">
          <div class="search_box">
            <form>
              <input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}"><input type="submit" value="SEARCH">
            </form>
          </div>
          <div class="shopping_cart">
            <div class="cart">
            <a href="#" title="View my shopping cart" rel="nofollow">
                <span class="cart_title">Cart</span>
                <span class="no_product">
                 
                </span>
              </a>
            </div>
            </div>
       <div class="login">
        <?php 
              $login = Session::get("cuslogin");
              if ($login == false) {
                  ?>
                  <a href="admin/login.php">Login</a>
              <?php
              } else {
                      ?>
              <a href="?cid=<?php //Session::get('loginId'); ?>">Logout</a>
              <?php
                  }
        ?>        
       </div>
       <div class="clear"></div>
  </div>
      <div class="clear"></div>
 </div>
<div class="menu">
  <ul id="dc_mega-menu-orange" class="dc_mm-orange">
    <?php
        $res = $navmenu->getMenu();
        if ($res) {
          while ($result = $res->fetch_assoc()) { 
    ?>        
              <li><a href="<?php echo $result['link']; ?>"><?php echo $result['name']; ?></a>
      <?php
          // check the menu is have any submenu list or not
          $checkIsParent = $navmenu->checkChildMenu($result['id']);
          if($checkIsParent){
            echo "<ul id='dc_mega-menu' class='dc_mm'  style='Font-size: 20px;'>";
            while($sub = $checkIsParent->fetch_assoc()){
              ?>
                    <li><a href="<?php echo $sub['link']; ?>"><?php echo $sub['name']; ?></a></li>
              <?php
            }
            echo "</ul>";
          }
          echo "</li>";
      } 
    }  ?>
     
      <li><a href="AboutUs.php">About US</a> </li>
    <div class="clear"></div>
  </ul>
</div>