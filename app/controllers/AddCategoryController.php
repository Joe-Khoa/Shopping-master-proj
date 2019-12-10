<?php

class AddCategoryController extends Controller {

    public function loadCategory(){
        $modelIndexCate = parent::model('IndexModel');
        $dataCate = $modelIndexCate->allCategory();
        // print_r( $dataCate ); die;
        $view = parent::view('MasterLayout',['detail' =>'addCategory', 'categories' =>$dataCate]);
    }
    public function addCategory(){
        if(!(isset($_POST['action']) && $_POST['action'] == 'addCategory')){
            echo 'failed';
            return false;
        }
        $name = $_POST['name'];
        $model = parent::model('addCategoryModel');
        $returnedId = $model->addCategory($name);
        if($returnedId){
            echo json_encode([
                'success' => true,
                'id' => $returnedId,
                'name' => $name,
                'status' => 1
            ]);
        }else{
            echo json_encode([
                'success' => false,
                'err' => 'faile to add new'
            ]);
        }
       
    
    }

    public function deleteCategory(){
        
        // echo json_encode(['success' => true ])  ;
        // print_r($_POST); die;
        if($_POST['action'] != 'del-cate'){
            echo json_encode(['success' => false]);
            return false;
        }
        $model = parent::model('addCategoryModel');
        $id = $_POST['id'];
        $name = $model->getCategoryById($id)->name;
        $deleteCate = $model->deleteCate($id);
        // var_dump($deleteCate);die;
        if(!$deleteCate){
            $deleteStatus = $model->deleteCateStatus($id);
            if($deleteStatus){
                echo json_encode([
                    'id' => $id,
                    'name' => $name,
                    'action' => 'updateStatus',
                    'success' => true,
                    'message' => "Category-name have include in bill, CAN'T DELETE PERMANENTLY, DataBase have updated 'STATUS of THIS CATEGORY' to DELETED ( not able to use anymore )"
                    ]);
            }else{
                echo json_encode([
                    'action' => 'updateStatus',
                    'success' => false,
                    'message' => "there is an error, can't not update status to deleted !"
                ]);
            }
        }else{
            echo json_encode([
                'id' => $id,
                'name' => $name,
                'action' => 'permanently',
                'success' => true,
                'message' => "have been deleted !"

            ]);

        }
        
    }

}


?>