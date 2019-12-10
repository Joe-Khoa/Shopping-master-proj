<?php
require_once '../app/core/helper/Pager.php';
require_once '../app/core/Controller.php';
class IndexController extends Controller{
    public function index(){
        $model = parent::model('IndexModel');
        // $products = $model->loadIndex();
        $categories = $model->allCategory();
        $totalProd = $model->getNoProduct()->totalId;
        $originURL = 'http://localhost/shopping-page-master/public/indexcontroller/index';
        // var_dump(explode('/',trim($_GET['url']))); die;
        // $url = $originURL.'1';
        $url='';
        if(isset($_GET['url'])){ 
            $url = explode('/',trim($_GET['url']));
        }
        // print_r($url); die;
        $currentPage  = 1;
        if(isset($url[2]) && is_numeric($url[2])){
            $currentPage = $url[2];
        }
        // echo 'current page : '.$currentPage.'<br>';
        // echo'<pre>';print_r($url);

        // echo $currentPage; 
        $nItemOnPage = 10;
        $totalPage  = ceil($totalProd/$nItemOnPage);
        if($currentPage > $totalPage){
            echo 'over page'; 
        }
        $positionStartNextPage = ($currentPage - 1)*$nItemOnPage;
        // echo '<pre>';print_r($products);
        $products = $model->getProductForAPage($positionStartNextPage,$nItemOnPage);
        // echo '<pre>';print_r($products); die;

        $paging = new Pager ($totalProd,$currentPage,$nItemOnPage,$nPageShow = 3,$originURL);
        $showPagination = $paging->showPagination();
        // echo '<pre>';print_r($products); die;
        $view = parent::view('MasterLayout',[
            'detail' => 'updateProuduct',
            'allProd' => $products,
            'allCategories'=>$categories,
            'showPagination' => $showPagination,
            
            
            ]);
    }
}



// for view 
/*m 

usercard
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/ui-user-card.html
profile
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/pages-profile.html
invoice
icon
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/icon-material.html
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/icon-fontawesome.html
upload
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/form-upload.html


Contact 
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/table-footable.html


card
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/ui-cards.html

btn 
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/ui-buttons.html
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/ui-bootstrap-switch.html
common 
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/eco-products-orders.html
detail - edit a specific product
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/eco-products-edit.html
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/eco-products-edit.html

not related table editale
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/table-editable-table.html
table
file:///C:/Users/Lilti/Documents/LEARNING/PROGRAMMING/BACK-END%20PHP/proj%20thay%20khoa%20,%20template/themeforest-gofqEkXJ-elite-admin-the-ultimate-dashboard-web-app-kit-material-design/ecommerce/table-jsgrid.html

*/
;