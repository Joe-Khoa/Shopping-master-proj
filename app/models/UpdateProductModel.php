<?php
require_once '../app/core/DB.php';
class UpdateProductModel extends DB{

    function getIdTypeByType($type){
        $sql = "SELECT id
        FROM categories
        WHERE name = '$type'";
        return parent::getOneRow($sql);
    }

    

    

    function updateProduct( $id, $id_type, $name, $price,
    $promotion_price, $promotion, $image, $status, $new, $update_at){
        // var_dump($image);
        // echo $image.'<br>'.' after converted: ';
        $setImage = $image == '0'?'':"image = '$image',";
        // echo $setImage; die;

        $sql_1 = " UPDATE products 
        SET id_type = $id_type,
        name  = '$name',
        price = $price,
        promotion_price = $promotion_price,
        promotion = '$promotion',";
        
        $sql_2 = "status = '$status',
        new = '$new',
        update_at = '$update_at'
        WHERE id = $id ";
        $sql = $sql_1.$setImage.$sql_2;
        // echo $sql; die;
        // echo '<pre>';
        $s =  parent::executeQuery($sql);
        // print_r($s); die;
        return $s;
    }


    function deleteProductStatus($id){
        $sql = "UPDATE `products`
        SET deleted  = 1
        WHERE id  = $id ";
        // echo $sql;
        $r = parent::DoAquery($sql) ;
        return $r;
    }
    function deleteProduct($id){
        $sql = "DELETE FROM `products`
        WHERE id  = $id ";
        // echo $sql; 
        $r = parent::DoAquery($sql) ;
        // echo 'del-model'.'<br>';var_dump($r); die;
        return $r;
    }
    function getProductById($id){
        $sql = " SELECT name
        FROM products
        WHERE id  = $id";
        return parent::getOneRow($sql);
    }

}

?>