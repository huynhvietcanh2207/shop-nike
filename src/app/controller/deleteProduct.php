<?php
include '../api/product_db.php';
if(isset($_GET['id'])){
    $id =$_GET['id'];
    $product_db=new Product_Db();
    $product_db->deleteProduct($id);
    header('Location:../view/quanlysanpham.php');
}