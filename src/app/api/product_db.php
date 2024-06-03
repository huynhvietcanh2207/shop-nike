
<?php
include 'db.php';
include 'product.php';
class Product_Db extends Database {
   
    
    public function getAllProducts(){
        $sql = self::$connection->prepare('SELECT * FROM products');
        $sql->execute();
        $items = array();
        // associative
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    
        $startRecord =($currentPage-1)*$perPage;
        $sql = self::$connection->prepare("SELECT * FROM product LIMIT $startRecord, $perPage");
        $sql->execute();
        $items = array();
        // associative
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    
    public function addProduct($product){
        // TRUYỀN values thì kh cần định nghĩa cột
        $sql = self::$connection->prepare('INSERT INTO products VALUES(?,?,?,?,?,?,?,?,?)');
        $sql->bind_param('isissiii',$product->id,$product->name,$product->price,$product->image,$product->description,$product->size,$product->views,$product->likes,$product->categories_id);
        $sql->execute();
    }

    public function editProduct($product){
       
        $sql = self::$connection->prepare('UPDATE products SET name=?,price=?,image=?,description=?,size=?,views=?,likes=?,categories_id=? WHERE id=?');
        $sql->bind_param('sissiiii',$product->name,$product->price,$product->image,$product->description,$product->size,$product->views,$product->likes,$product->categories_id,$product->id);
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

}


