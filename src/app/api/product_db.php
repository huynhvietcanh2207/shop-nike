
<?php
include 'db.php';
// include 'model.php';
include 'product.php';
class Product_Db extends Database{
   
   
    public function getAllProducts(){
        $sql = self::$connection->prepare('SELECT * FROM products');
        $sql->execute();
        $items = array();
        // associative
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getAllProductsPaginate($currentPage,$perPage){
        $startRecord =($currentPage-1)*$perPage;
        $sql = self::$connection->prepare("SELECT * FROM products LIMIT $startRecord, $perPage");
        $sql->execute();
        $items = array();
        // associative
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    
    
    public function addProduct($product){
        // TRUYỀN values thì kh cần định nghĩa cột
        $sql = self::$connection->prepare('INSERT INTO products VALUES(?,?,?,?,?,?,?,?,?)');
        $sql->bind_param('isissiiii',$product->id,$product->name,$product->price,$product->image,$product->description,$product->size,$product->views,$product->likes,$product->categories_id);
        $sql->execute();
    }

    public function editProduct($product){
       
        $sql = self::$connection->prepare('UPDATE products SET name=?,price=?,image=?,description=?,size=?,views=?,likes=?,categories_id=? WHERE id=?');
        $sql->bind_param('sissiiiii',$product->name,$product->price,$product->image,$product->description,$product->size,$product->views,$product->likes,$product->categories_id,$product->id);
        $sql->execute();
    }
    public function deleteProduct($id){
      
        $sql = self::$connection->prepare('DELETE FROM products WHERE id=?');
        $sql->bind_param('i',$id);
        $sql->execute();
    }
    public function getProductById($id){
        $sql =self::$connection->prepare('SELECT * FROM products WHERE id=?');
        $sql->bind_param('i',$id);
        $sql->execute(); 
        $items=$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        $product = null;
        foreach($items as $key => $value)
        {
            
            $product = new Product($value['id'],$value['name'],$value['price'],$value['image'],$value['description'],$value['size'],$value['views'],$value['likes'],$value['categories_id']);
        }
        return $product;

    }
    
    public function getSearchProduct($keyword)
    {
        // statement
        $sql = self::$connection->prepare("SELECT * FROM product WHERE name LIKE '%$keyword%' OR price LIKE '%$keyword%' OR id LIKE '%$keyword%'");
        $sql->execute();
        $items =array();
        $items =$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    // tìm kiếm phân trang
    public function getSearchProductPaginate($keyword,$currentPage,$perPage)
    {
        $startRecord = ($currentPage - 1) * $perPage;
        // statement
        $sql = self::$connection->prepare("SELECT * 
         FROM product
         WHERE name LIKE '%$keyword%' 
         OR price LIKE '%$keyword%' 
         OR id LIKE '%$keyword%' 
         LIMIT $startRecord, $perPage");
        $sql->execute();
        $items =array();
        $items =$sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    function createPageLink($page, $total, $perPage){
        $totalLinks = ceil($total/$perPage);
             $link ="";
                for($j=1; $j <= $totalLinks ; $j++)
                 {
                      $link = $link."
                    
                      <a class='btn btn-primary paginate' href='?page=$j'> $j </a>
                      
                      " . " ";
                 }
                 return $link;
        }
    function getPaginationBar($page, $total, $perPage){
        $totalLinks = ceil($total/$perPage);
             $link ="";
                for($j=1; $j <= $totalLinks ; $j++)
                 {
                    $active = ($j ==$page)? "active" : "";
                      $link .= $link. "<li class='page-item'".$active . "><a href='?page=" .$j . "' class='page-link'>$j</a></li>";
                 }
                 return $link;
        }
        function getPaginationBarAllProduct($url, $total, $perPage){
            $totalLinks = ceil($total/$perPage);
                 $link ="";
                    for($j=1; $j <= $totalLinks ; $j++)
                     {
                          $link = $link." <a class='btn btn-primary paginate' href='$url?page=$j'> $j </a>" . " ";
                     }
                     return $link;
            }
}




