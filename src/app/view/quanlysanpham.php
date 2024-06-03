<?php
include '../api/product_db.php';
$product_db = new Product_Db();
if (isset($_POST['deleteId'])) {
    $id = $_POST['deleteId'];
    if ($product_db->deleteProduct($id)) {
        echo "Xóa thành công";
    }
}
$page =1;
$perpage=5;
$totalSP = $product_db->getAllProducts();
$total=sizeof($totalSP);
if(isset($_GET['page'])){
    $page=$_GET['page'];
}

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

    <!-- <link rel="stylesheet" href="../../../../shop-nike/public/css/image.css"> -->
    <!-- <link rel="stylesheet" href="../../../../shop-nike/public/css/btnanimation.css"> -->
    <link rel="stylesheet" href="../../../../shop-nike/public/css/all.min.css">
    <link rel="stylesheet" href="../../../../shop-nike/public/css/btnManagement.css">
</head>

<body>
    <h4 class="text-center text-dark" style="font-size: 1.5em; font-weight: bold;">Quản lý sản phẩm</h4>
    <!-- <form action="../view/index.php" method="get">
    <label for="">Tìm kiếm sản phẩm</label>
                    <input type="text" name="name" class="form-control " placeholder="Input key..." id="">
                    <input type="submit" value="Search" name="search">
                </form> -->
    <!-- <div class="container"> -->

    <!-- dssp có action 3 -->
    <!-- <a href="../app/"></a> -->

    <a class="btn" href="addProduct.php" class="">Add new product</a>
    <table class="table">
        <caption>List of product</caption>
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Size</th>
                <th scope="col">Views</th>
                <th scope="col">Likes</th>
                <th scope="col">Categories_id</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody>

            <?php

            $product_db = new Product_Db();
            $dssp = $product_db->getAllProductsPaginate($page,$perpage);

            // $key ='';
            // if(isset($_GET['page'])){
            //     $currentPage = $_GET['page'];
            // }
            // else{
            //     $currentPage=1;
            // }
            // if (isset($_GET['search'])) {
            //     $key = $_GET['name'];
            //     // tìm kiếm theo tên : kí tự o a để dễ tìm
            //     $dssp = $product_db->getSearchProductPaginate($key,$currentPage,2);
            
            // }
            foreach ($dssp as $item) {
                ?>
                <tr>
                    <td><?php echo $item['id'] ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['price'] ?></td>

                    <td>
                        <img src="../../../../shop-nike/public/image/<?php echo $item['image'] ?>" alt="" class="img-fluid"
                            style="width: 100px">
                    </td>
                    <td><?php echo $item['description'] ?></td>
                    <td><?php echo $item['size'] ?></td>
                    <td><?php echo $item['views'] ?></td>
                    <td><?php echo $item['likes'] ?></td>
                    <td><?php echo $item['categories_id'] ?></td>
                    <td>
                        <div class="row">
                            <div class="col-6">
                                <a class="btn" href="updateProduct.php?id=<?php echo $item['id'] ?>" class="">Update</a>

                            </div>
                            <div class="col-6">

                                <form action="quanlysanpham.php" method="post"
                                    onsubmit="return confirm('Bạn có muốn xóa không?')">
                                    <input type="hidden" name="deleteId" value="<?php echo $item['id'] ?>">
                                    <button type="submit" class="btn">Delete</button>
                                </form>

                            </div>
                        </div>

                        <!-- <button class="btn">Delete</button> -->
                    </td>
                </tr>
                <?php
            }
            ?>


        </tbody>
        <tfoot>
          
        </tfoot>
    </table>

    <ul class="pagination">
        <li class="page-item">
            <a href="#" class="page-link">Previous</a>
        </li>
        
        <?php
        // $url=$_SERVER['PHP_SELF'];
      echo  $product_db->createPageLink($page,$total,$perpage); ?>
          <!-- <li class="page-item"><a href="#" class="page-link">4</a></li> -->
         
          <li class="page-item">
            <a href="#" class="page-link">Next</a>
          </li>
        </ul>
    <?php
    // if(isset($_GET['search']))
    // {
    //     $key = $_GET['name'];
    //     $product_db = new Product_Db();
    
    //     $url = $_SERVER['PHP_SELF'] . "?name=" . $key;
    
    //     $dsspSearch =$product_db->getSearchProduct($key);
    //     $total = sizeof($dsspSearch);
    //     // echo 'Tổng số sp tìm được' . $total;
    
    //    echo $product_db->getPaginationBar($url,$total,2);
    // }
    // if(!isset($_GET['search'])){
    //     $product_db = new Product_Db();
    
    //     $url = $_SERVER['PHP_SELF'];
    
    //     $dsspPaginate =$product_db->getAllProducts();
    //     $total = sizeof($dsspPaginate);
    //     // echo 'Tổng số sp tìm được' . $total;
    
    //    echo $product_db->getPaginationBarAllProduct($url,$total,2);
    // }
    
    ?>

</body>

</html>