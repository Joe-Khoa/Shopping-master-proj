<?php

class ProductDetailController extends Controller{


    public function loadProdDetail(){
        parent::view('MasterLayout', ['detail' => 'proDetail']);
    }
}
?>