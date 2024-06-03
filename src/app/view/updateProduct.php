<?php
include '../api/product_db.php';
$product_db=new Product_Db();
if(isset($_GET['id'])){
    $id=$_GET['id'];
}
$product =$product_db->getProductById($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/styleindex.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/button.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/navbar.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/fall.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/image.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/btnanimation.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/all.min.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/btnManagement.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/formManagement.css">
</head>
<body>
<div class="container">
    <div class="form_area">
        <p class="title">Update Product</p>
        <form action="../controller/updateProduct.php" method="post" enctype="multipart/form-data">
            <div class="form_group">
                <label class="sub_title" for="name">Id:</label>
                <input value="<?php echo $product->id ?>" placeholder="Enter your id" class="form_style" name="id" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Name:</label>
                <input value="<?php echo $product->name ?>" placeholder="Enter your name"  name="name"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Price:</label>
                <input value="<?php echo $product->price ?>" placeholder="Enter your price"  name="price"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Image:</label>
                <input value="<?php echo $product->image ?>" placeholder="Enter your image"  name="image"  class="form_style" type="file">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Description:</label>
                <input value="<?php echo $product->description ?>" placeholder="Enter your description"  name="description"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Size:</label>
                <input value="<?php echo $product->size ?>" placeholder="Enter your size"  name="size"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Views:</label>
                <input value="<?php echo $product->views ?>" placeholder="Enter your views"  name="views"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Likes:</label>
                <input value="<?php echo $product->likes ?>" placeholder="Enter your likes"  name="likes"  class="form_style" type="text">
            </div>
            <div class="form_group">
                <label class="sub_title" for="email">Categories_Id:</label>
                <input value="<?php echo $product->categories_id ?>" placeholder="Enter your categories_id"  name="categories_id"  class="form_style" type="text">
            </div>
          
            <div>
                <input  type="submit" class="btn" name="update" value="Update">
                <!-- <button class="btn">SIGN UP</button> -->
                <a class="link" href="">
            </a></div><a class="link" href="">
        
    </a></form></div><a class="link" href="">
</a></div>
</body>
</html>