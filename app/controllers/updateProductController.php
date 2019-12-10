<?php

require_once '../app/core/Controller.php';

class updateProductController extends Controller{
    public function AjaxUpdateProduct(){
        // $mess =  'update Product';
        if( !isset($_POST['action'])){
            $_SESSION['error'] = ' an error is occurred';
            header('location:http://localhost/shopping-page-master/public/indexcontroller/index');
            return false;
        }
        if( $_POST['action'] != 'updateDB'){
            $_SESSION['error'] = ' an error is occurred';
            header('location:http://localhost/shopping-page-master/public/indexcontroller/index');
            return false;
        }
        // echo  '<pre>'; print_r($_POST); die;
        // print_r($_FILES['image']);die;
        // $id = isset($_POST['id'])?$_POST['id']:null;
        // $name = isset($_POST['name'])?$_POST['name']:null;
        // // $detail = isset($_POST['detail'])?$_POST['detail']:null;
        // $type = isset($_POST['type'])?$_POST['type']:null;
        // $price = isset($_POST['price'])?$_POST['price']:null;
        // $promotion_price = isset($_POST['prmtPrice'])?$_POST['prmtPrice']:null;
        // $promotion = isset($_POST['promotion'])?$_POST['promotion']:null;
        // $status = isset($_POST['status'])?$_POST['status']:null;
        // $image = isset($_POST['imaga'])?$_POST['image']:null;
        // $new = isset($_POST['new'])?$_POST['new']:null;
        // $update_at = isset($_POST['date'])?$_POST['date']:null;
        $id = $_POST['id'];
        $type  = $_POST['type'];
        $name  = $_POST['name'];
        $price  = $_POST['price'];
        $promotion_price  = $_POST['promtPrice'];
        $promotion  = $_POST['promotion'];
        $image = $_POST['image'];
        $status  = $_POST['status'];
        $new  = $_POST['new'];
        $update_at  = $_POST['date'];
        $new = json_decode($new);
        $status = json_decode($status);
        // var_dump($status);
        // echo '<br>';
        // var_dump($new); 
        // if it's not ENCODE -> string TRUE/FALSE is same result
        $status = $status? 1:0;
        $new = $new? 1:0;
        // die;
        $model = parent::model('UpdateProductModel');
        $id_type = $model->getIdTypeByType($type)->id; 
        $data = $model->updateProduct( $id, $id_type, $name, $price,
         $promotion_price, $promotion, $image, $status, $new, $update_at);             
        echo json_encode([
            'success' => true,
            'name' => $name,
            'type' => $type,
            'price' => $price,
            'promtPrice' => $promotion_price,
            'promotion' => $promotion,
            'image' => $image,
            'status' => $status,
            'new' => $new,
            'date' => $update_at,
        ]);
        // $mess =  $status.'<br>'.$new;
        // return false;
    }
    public function upLoadFile(){
        // $mess =  getcwd(); // best to point to a directory
        // echo '<pre>';print_r($_FILES); echo 'die here';die; 
        $file = $_FILES["fileName"];
        $target_dir = "source/assets/products-images/";
        $target_file = $target_dir . basename($_FILES["fileName"]["name"]);
        $uploadOk = 1;
        $exist = 0;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $mess = '';
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileName"]["tmp_name"]);
            if($check !== false) {
                $mess =  "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                $mess =  "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $mess =  ". File already exists.";
            $uploadOk = 0;
            $exist  = 1;
        }
        // echo $exist.'die 98'; die; 
        // Check file size
        if ($_FILES["fileName"]["size"] > 500000) {
            $mess =  " .Your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $mess =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $mainMess =  "Sorry, your file was not uploaded";
            // echo 'exist : '.$exist.'<br>';print_r($file['name']);die;
            echo json_encode([
                'filename' => $file['name'],
                'exist' => $exist,
                'success' => false,
                'message' => $mainMess.$mess
            ]);
            
        // echo $exist; die;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
                $mess =  "The file ". basename( $_FILES["fileName"]["name"]). " has been uploaded.";
                echo json_encode([
                    'success' => true,
                    'filename' => $file['name'],
                    'tmp_name' => $file['tmp_name'],
                    'message' => $mess
                ]);
            } else {
                $mess =  " .There was an error uploading your file.";
                echo json_encode([
                    'success' => false,
                    'message' => $mess
                ]);
            }
        }        
    }
    public function deleteProduct(){
        // echo json_encode(['success' => true ])  ;
        if($_POST['action'] != 'deleteProduct'){
            echo json_encode(['success' => false]);
            return false;
        }
        $model = parent::model('UpdateProductModel');
        $id = $_POST['id'];
        $name = $model->getProductById($id)->name;
        $deleteProduct = $model->deleteProduct($id);
        // var_dump($deleteProduct);die;
        if(!$deleteProduct){
            $deleteStatus = $model->deleteProductStatus($id);
            if($deleteStatus){
                echo json_encode([
                    'id' => $id,
                    'name' => $name,
                    'action' => 'updateStatus',
                    'success' => true,
                    'message' => "Product name have include in bill, CAN'T DELETE PERMANENTLY, DataBase have updated 'PRODUCT STATUS' to DELETED ( not able to use anymore )"
                    ]);
            }else{
                echo json_encode([
                    'action' => 'updateStatus',
                    'success' => false,
                    'message' => "there is an error, can't not update status deleted !"
                ]);
            }
        }else{
            echo json_encode([
                'id' => $id,
                'name' => $name,
                'action' => 'deletePermanently',
                'success' => true
            ]);

        }
        
    }
}

?>