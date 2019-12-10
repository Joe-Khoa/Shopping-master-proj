<?php
// echo cwd(); die;

require_once '../app/core/DB.php';
class addCategoryModel extends DB{
    public function addCategory($name){
        $sql = " INSERT INTO categories (name,status)
        VALUES ('$name',1)
        ";
        $r = parent::getLastId($sql);
        // print_r($r); die;
        return $r;
    }
    public function getCategoryById($id){
        $sql = "SELECT name 
        FROM categories 
        WHERE id  =$id";
        return parent::getOneRow($sql);
    }

    function deleteCateStatus($id){
        $sql = "UPDATE `categories`
        SET deleted  = 1
        WHERE id  = $id ";
        // echo $sql;
        $r = parent::DoAquery($sql) ;
        return $r;
    }
    function deleteCate($id){
        $sql = "DELETE FROM `categories`
        WHERE id  = $id ";
        // echo $sql; 
        $r = parent::DoAquery($sql) ;
        // echo 'del-model'.'<br>';var_dump($r); die;
        return $r;
    }

}


?>