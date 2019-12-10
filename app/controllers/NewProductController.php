<?php

class NewProductController extends Controller {
    public function newProduct(){
        $model = parent::model('NewProductModel');
        $data = $model->getCategories();
        
        $view = parent::view('MasterLayout',[ 'detail' => 'newProduct','categories' => $data]);
    }

    public function addNewProduct(){
        $model = parent::model('NewProductModel');
        if(!isset($_POST['action']) || $_POST['action'] != 'addNewProduct'){
            echo 'failed';
            return false;
        }
        $model = parent::model('NewProductModel');
        // echo '<pre>';print_r($_POST); die;
        $name  =  $_POST['name'];
        $price  =  $_POST['price'];
        $type = $_POST['category'];
        $promotion_price  =  $_POST['proPrice']; 
        $promotion  =  $_POST['name'];
        $detail  =  $_POST['detail'];
        $image = $_POST['image'];
        $status  =  $_POST['status'];
        $new  =  $_POST['new']; 
        $update_at  =  $_POST['updateAt'];
        // $update_at = strtotime($update_at);
        // $update_at = date('Y-m-d',$update_at);

        // $new = json_decode($new);
        // $status = json_decode($status);

        // var_dump($status); 
        // var_dump($new);
        $status = $status? 1:0; 
        $new = $new? 1:0;
        
        $id_type = $model->getIdtypeByType($type)->id; // call sql 
        $result = $model->addNewProduct($id_type, $name, $price,
        $promotion_price, $promotion, $image, $status, $new, $update_at);
        if($result != ''){
            echo json_encode([
                'success' => true,
                'message' => "add new product successfully new $result "
            ]);
        }
    }
}
?>