<?php
include '../api/product_db.php';

// include '../api/product_db.php';
// include '../model/product.php';

if(isset($_POST['add'])){
    $id=$_POST['id'];
    $name=$_POST['name'];
    $price=$_POST['price'];
    $image=$_FILES["image"]["name"];
    $description=$_POST['description'];
    $size=$_POST['size'];
    $views=$_POST['views'];
    $likes=$_POST['likes'];
    $categories_id=$_POST['categories_id'];
    $product_db =new Product_Db();
    $product=new Product($id,$name,$price,$image,$description,$size,$views,$likes,$categories_id);
    $product_db->addProduct($product);
   
$target_dir = "../../../../shop-nike/public/image/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

    header('Location:../view/quanlysanpham.php');
    // ../view/quanlysanpham.php
}