<?php
    //include '';

    $cat = new Category();
    $getCat = $cat->getAllCat();
                       
?>
<!-- all categories list display -->
<div class="grid_2">
    <div class="box sidemenu">
        <div class="block" id="section-menu">
            <ul class="section menu">
               		
                <li><a class="menuitem">Default Category</a>
                <ul class="submenu">
                <?php
                     if ($getCat) {
                        while ($result = $getCat->fetch_assoc()) {
                             
                ?>
                        <li><a href="catproduct.php?catid=<?php echo $result['ID'];?>"><?php echo $result['catName'];  ?> </a> </li>
                  <?php } 
                  }?>      
                    </ul>
                </li>
                <li><a href="dashboard.php">Back</a></li>
            </ul>
        </div>
    </div>
</div>
