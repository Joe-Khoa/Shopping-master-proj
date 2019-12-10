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
                                        <th>type</th>
                                        <th>Price</th>
                                        <th>Promotion Price</th>
                                        <th>Promotion</th>
                                        <th>Detail</th>
                                        <th>images</th>
                                        <th>Status (special)</th>
                                        <th>New</th>
                                        <th>Update_at</th>
                                    </tr>
                                </thead>
                                <!-- ----------------------- MAIN CARD ----------------------------- -->
                                <tbody class=" body-0">
                                    <tr class="tabdData ">
                                        <td>
                                            <textarea id='prod-name-' class="input-text-colr" cols="10" rows="5"
                                                style="width:120px !important;"></textarea>
                                        </td>
                                        <td>
                                            <select id='prod-cate-' class="input-text-colr ">
                                                <?php foreach($categories as $cate):?>
                                                <option value="<?=$cate->name?>"><?=$cate->name?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td>
                                            <input id='prod-price-' type="number" class="input-text-colr "
                                                style="width:120px !important;">
                                        </td>
                                        <td>
                                            <input id='prod-pro-price-' type="number" class="input-text-colr "
                                                style="width:120px !important;">
                                        </td>
                                        <td>
                                            <textarea id='prod-promotion-' class="input-text-colr " cols="20" rows="10"
                                                style="width:150px !important;"></textarea>
                                        </td>
                                        <td>
                                            <textarea id='prod-detail-' class="input-text-colr " cols="20" rows="10"
                                                style="width:150px !important;"></textarea>
                                        </td>
                                        <td>
                                            <div class="input-text-colr "
                                                style="background-color:white; border: none; ">
                                                <input type="file" name="fileToUpload" id="fileImage">
                                                <button class="submit-img-form-newPro mt-1" type=""
                                                    style="width:110px;font-size:13px;">New/Change
                                                </button>
                                                <p id = ''class ="notYetChooseNewImageText text-danger" style="width:200px; font-size : 12px; padding-top:3px; padding-left:10px">(not yet choose)</p>
                                                <p class ="chosenNewImageText text-success" style="width:200px; font-size : 12px; padding-top:3px; padding-left:10px;display:none">(image chosen !)</p>
                                            </div>
                                        </td>
                                        <td>
                                            <input id='prod-status-' class="input-text-colr "
                                                style="width:17px !important" type="checkbox" class=""
                                                style="width:15px; height:15px;">
                                        </td>
                                        <td>
                                            <input id='prod-new-' class="input-text-colr " style="width:17px !important"
                                                type="checkbox" class="" style="width:15px; height:15px;">
                                        </td>
                                        <td>
                                            <input id='prod-update-at-' class="input-text-colr " style="" type="date"
                                                value="">
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
                    <div class='btn-creatProduct-div'>
                        <button class="create-btn d-flex justify-content-center btn btn-success "> Create new
                            product(s)</button>
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