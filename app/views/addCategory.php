<link href="../public/source/dist/css/newProduct.css" rel="stylesheet">

<?php $categories = $data['categories'];?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Add new product(s)</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a
                                href="http://localhost/shopping-page-master/public/indexcontroller/index/">Home</a></li>
                        <li class="breadcrumb-item active">Add Products</li>
                    </ol>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Info box Content -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- Column -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table product-overview" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status/Edit</th>
                                      
                                    </tr>
                                </thead>
                                <!-- ----------------------- MAIN CARD ----------------------------- -->
                                <tbody class=" body-0">
                                        <?php foreach($categories as $cate):?>
                                            <tr id ="tabdData-id-<?=$cate->id?>" class="tabdData " cate-id = "<?=$cate->id?>">
                                                <td>
                                                    <li style="list-style-type: none"><?=$cate->name?></li>
                                                </td>
                                                <td>
                                                    <input type="checkbox" disabled <?=$cate->status==1?'checked':'';?> class='' >
                                                    <i edit-id = "<?=$cate->id?>" class="ti-marker-alt editCateicon" style=" color: orange; padding-left: 15px; cursor: pointer;"></i>
                                                    <i trash-id="<?=$cate->id?>" class="ti-trash trash-1 delCateTrash" style=" color: orange; padding-left: 10px; cursor: pointer;" ></i>
                                                </td>  
                                            </tr>
                                        <?php endforeach;?>
                                        <tr class="tabdDataHidden " style="display:none">
                                                <td>
                                                     <input id="newCateInputName" type="text" style="border-radius:3px; font-size :small; width :400px;">
                                                </td>
                                                <td>
                                                    <i id="ConfirmCateBtn" class="ti-arrow-circle-down " style=" color: red; padding-left: 31.5px; cursor: pointer;"  ></i>
                                                </td>  
                                        </tr>
                                        <tr id ="" class="tabdData tabdData-hiddendNewProd " cate-id = "" style="display:none">
                                                <td class= "tdName">
                                                    <li style="list-style-type: none">show the new</li>
                                                </td>
                                                <td class= "tdEditStatus">
                                                    <input type="checkbox" class='' >
                                                    <i edit-id = "" class="ti-marker-alt editCateicon " style=" color: orange; padding-left: 15px; cursor: pointer;"></i>
                                                    <i trash-id="" class="ti-trash trash-1 delCateTrash" style=" color: orange; padding-left: 10px; cursor: pointer;" ></i>
                                                </td>  
                                        </tr>                                        

                                </tbody>
                                <!-- ----------------------- END  MAIN CARD 0 ----------------------------- -->                        

                                <tbody class= 'body-empty'>
                                    <tr>
                                        <td>
                                            <div class='addmorePr' style="cursor:pointer">
                                                <i class="ti-plus"> Add more</i>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <div class="right-sidebar">
            <div class="slimscrollright">
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                <div class="r-panel-body">
                    <ul id="themecolors" class="m-t-20">
                        <li><b>With Light sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme working">1</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                        <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                        <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a>
                        </li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/1.jpg" alt="user-img"
                                    class="img-circle"> <span>Varun Dhavan <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/2.jpg" alt="user-img"
                                    class="img-circle"> <span>Genelia Deshmukh <small
                                        class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/3.jpg" alt="user-img"
                                    class="img-circle"> <span>Ritesh Deshmukh <small
                                        class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/4.jpg" alt="user-img"
                                    class="img-circle"> <span>Arijit Sinh <small
                                        class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/5.jpg" alt="user-img"
                                    class="img-circle"> <span>Govinda Star <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/6.jpg" alt="user-img"
                                    class="img-circle"> <span>John Abraham<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/7.jpg" alt="user-img"
                                    class="img-circle"> <span>Hritik Roshan<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../assets/images/users/8.jpg" alt="user-img"
                                    class="img-circle"> <span>Pwandeep rajan <small
                                        class="text-success">online</small></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>

<script>




</script>