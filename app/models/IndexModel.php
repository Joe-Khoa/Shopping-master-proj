<?php 
require_once '../app/core/DB.php';

class IndexModel extends DB {

    public function loadIndex(){
        $sql = " SELECT p.*, c.name as cate_name
            FROM products p, categories c
            WHERE p.id_type = c.id
            ORDER BY id";
        $r =  parent::getMultipleRow($sql);
        // echo '<pre>';print_r($r);die;
        return $r;
        
    }   
    public function allCategory(){
        $sql = "SELECT name, id ,status
        FROM categories";
        $r = parent::getMultipleRow($sql);
        // echo '<pre>';print_r($r);  die;
        return $r;
    }
    public function getNoProduct(){
        $sql = " SELECT COUNT(id) as totalId 
        FROM products 
        ";
        $r = parent::getOneRow($sql);
        // echo 'model';print_r($r);die;
        return $r;
    }

    public function getProductForAPage($positionStart,$nItemOnPage){
        $sql = " SELECT p.*, c.name as cate_name
            FROM products p, categories c
            WHERE p.id_type = c.id
            ORDER BY id
            LIMIT $positionStart,$nItemOnPage
            ";
        $r =  parent::getMultipleRow($sql);
        // echo '<pre>';print_r($r);die;
        return $r;
    }


}

?>