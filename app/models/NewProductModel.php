<?php
require_once '../app/core/DB.php';

class NewProductModel extends DB{
    public function getCategories(){
        $sql = "SELECT name 
        FROM categories
        ORDER BY name";
        $r = parent::getMultipleRow($sql);
        // echo '<pre>';print_r($r); die;
        return $r;
    }
    public function getIdtypeByType($type){
        $sql = "SELECT id 
        FROM categories 
        WHERE name = '$type'";
    
        $r = parent::getOneRow($sql);
        // echo '<pre>';print_r($r);die;
        return $r;

    }
    public function addNewProduct($id_type, $name, $price,
    $promotion_price, $promotion, $image, $status, $new, $update_at){
        // echo $update_at; die;
        $sql = "INSERT INTO products(id_type, name, price,
            promotion_price, promotion, image, status, new, update_at)
        VALUES ($id_type, '$name', $price,
            $promotion_price, '$promotion', '$image', $status, $new, '$update_at')";
        // echo $sql; die;
        $r = parent::getLastId($sql);
        // var_dump($r); die;
        return $r;
    }
    
}




// INSERT INTO `products`(`id_type`, `name`, `price`, `promotion_price`, `promotion`, `image`, `status`, `new`, `update_at`) VALUES (17, iphone, 15000000, 140000000, iphone, 123, 1, 1, 2019-11-23)