<?php
    $insertProduct="";
    function product_add(){
        $product = new Product();
        global $insertProduct;
        if(isset($_POST['submit'])){
            $name= $_POST['productName'];
       
            $insertProduct=$product->productInsert($_POST, $_FILES);
          }  
    }
    /*
    if(isset($_POST['submit'])){
        $insertProduct=product_add();
            echo "<script>alert('inserted');</script>";
            echo "<span class='success'>Product Inserted Successfully</span>";
        
    header('Location: add_product.php');
    }*/
?>