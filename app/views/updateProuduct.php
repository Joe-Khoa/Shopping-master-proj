<link href="../public/source/dist/css/updateProduct.css" rel="stylesheet">

<style>

.pagination-area ul {
    color: #ff004c;
}

.pagination-area ul {
    /* width: 500px; */
    /* padding-left:auto;
    padding-right:auto; */
    margin-left:auto;
    margin-right:auto;
    
}

.pagination-area ul li {
    float: left;
    list-style-type:none;
    font-size: 20px;
    padding: 12px;
    /* width: 30px !important; */
    
}
l
}
.pagination-area ul li:first-child a{
    /* background-color:red;     */
}
.pagination-area ul li:last-child{
    width: 150px !important ;
}


</style>

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
                <h4 class="text-themecolor">Products edit</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Products edit</li>
                    </ol>
                    <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i
                            class="fa fa-plus-circle"></i> <a href="http://localhost/shopping-page-master/public/NewProductController/NewProduct" class='text-white'> Create New</a></button>
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
                                        <th>images</th>
                                        <th>Status (special)</th>
                                        <th>New</th>
                                        <th>Update_at</th>
                                        <th>Update/Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach( $data['allProd'] as $prod) :?>
                                            <tr class = "tabdData-<?=$prod->id?>"  >
                                                <td >
                                                    <div id="name-PHP-<?=$prod->id?>" class="inputChildPHP-<?=$prod->id?>" ><?=$prod->name?></div>       
                                                    <input id = "name-<?=$prod->id?>" class= "input-text-colr input-text-colr-<?=$prod->id?>" style="" type="text" value="<?=$prod->name?>" >
                                                 </td>
                                                 <td>
                                                    <div id="cateName-PHP-<?=$prod->id?>"  class="inputChildPHP-<?=$prod->id?>" ><?=$prod->cate_name?></div>       
                                                    <!-- <input id = "cateName-?=$prod->id?>"  class= "input-text-colr input-text-colr-?=$prod->id?>" style="" type="text" value="?=$prod->cate_name?>" > -->
                                                    <select name="" id="cateName-<?=$prod->id?>"  class= "input-text-colr input-text-colr-<?=$prod->id?>" >
                                                        <option value="<?=$prod->cate_name?>"><?=$prod->cate_name?></option>
                                                        <?php foreach($data['allCategories'] as $cateItem ) : ?>
                                                            <option value="<?=$cateItem->name?>"><?=$cateItem->name?></option>
                                                        <?php endforeach ;?>
                                                    </select>
                                                 </td>
                                                 <td>
                                                     
                                                 <div id="price-PHP-<?=$prod->id?>"   class="inputChildPHP-<?=$prod->id?>" ><?=number_Format($prod->price,'0','.',',');?></div>       
                                                    <input  id = "price-<?=$prod->id?>"  class= "input-text-colr input-text-colr-<?=$prod->id?>" style="" type="number" value="<?=$prod->price?>" >
                                                 </td>
                                                 <td>
                                                    <div id="promtPrice-PHP-<?=$prod->id?>" class="inputChildPHP-<?=$prod->id?>" ><?=number_Format($prod->promotion_price,'0','.',',');?></div>       
                                                    <input  id = "promtPrice-<?=$prod->id?>"   class= "input-text-colr input-text-colr-<?=$prod->id?>" style="" type="number" value="<?=$prod->promotion_price?>" >
                                                 </td>  
                                                 <td>
                                                    <div id="promotion-PHP-<?=$prod->id?>"  class="inputChildPHP-<?=$prod->id?>" ><?=$prod->promotion?></div>    
                                                    <!-- <input id = "promotion-?=$prod->id?>" class= "input-text-colr input-text-colr-?=$prod->id?>" style = "height:300px;width:100px; !important;" type="text" value="?=$prod->promotion?>" > -->
                                                    <textarea id = "promotion-<?=$prod->id?>" class= "input-text-colr input-text-colr-<?=$prod->id?>" cols="20" rows="10" style="width:150px !important;"><?=$prod->promotion?></textarea>
                                                 </td>                                                
                                                <td> 
                                                    <div id="image-PHP-<?=$prod->id?>"  class="inputChildPHP-<?=$prod->id?>" >
                                                        <img alt='' width='80' src="../public/source/assets/products-images/<?=$prod->image;?>" > 
                                                    </div>
                                                    <div class= "input-text-colr input-text-colr-<?=$prod->id?>" style="background-color:white; border: none; ">
                                                            <input type="file" name="fileToUpload" id="fileImage<?=$prod->id?>">
                                                            <div id= "image-status-<?=$prod->id?>" style="visibility: hidden;">...</div>
                                                            <button class="submit-img-form mt-1" type="" style="width:110px;font-size:13px;">New/Change</button>
                                                            <p class ="notYetChooseImageText text-danger" style="width:200px; font-size : 12px; padding-top:3px; padding-left:10px">(not yet choose)</p>
                                                            <p class ="chosenImageText text-success" style="width:200px; font-size : 12px; padding-top:3px; padding-left:10px;display:none">(image chosen !)</p>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="inputChildPHP-<?=$prod->id?>" >
                                                        <input  id="status-PHP-<?=$prod->id?>"  style = "display: block; width:17px !important" type="checkbox"  disabled <?=$prod->status==1?'checked':'';?> class=""  style="width:15px; height:15px;">
                                                    </div>
                                                    <input id = "status-<?=$prod->id?>"  class= "input-text-colr input-text-colr-<?=$prod->id?>"  style = "width:17px !important" type="checkbox"  <?=$prod->status==1?'checked':'';?> class=""  style="width:15px; height:15px;">
                                                </td>                                             
                                                <td>
                                                    <div class="inputChildPHP-<?=$prod->id?>" >
                                                        <input  id="new-PHP-<?=$prod->id?>"  style = "display: block; width:17px !important" type="checkbox"  disabled <?=$prod->new==1?'checked':'';?> class=""  style="width:15px; height:15px;">
                                                    </div>
                                                    <input id = "new-<?=$prod->id?>"  class= "input-text-colr input-text-colr-<?=$prod->id?>"  style = "width:17px !important" type="checkbox"  <?=$prod->new==1?'checked':'';?> class=""  style="width:15px; height:15px;">
                                                </td>
                                                <td>
                                                    <div id="update-at-PHP-<?=$prod->id?>"   class="inputChildPHP-<?=$prod->id?>" ><?=$prod->update_at?></div>       
                                                    <input id = "update-at-<?=$prod->id?>"  class= "input-text-colr input-text-colr-<?=$prod->id?>" style="" type="date" value="<?=$prod->update_at?>" >
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" class="text-inverse p-r-10" data-toggle="tooltip" title="Edit">
                                                        <i data-id = "<?=$prod->id?>" class="ti-marker-alt edit-icon edit-icon-<?=$prod->id?>"></i>
                                                    </a> 
                                                    <a
                                                        href="javascript:void(0)" class="text-inverse" title="Delete" data-toggle="tooltip">
                                                        <i data-id = "<?=$prod->id?>" class="ti-trash trash-<?=$prod->id?>" >

                                                        </i>
                                                    </a>
                                                    <div confirm-id='<?=$prod->id?>' class="confirm-edit confirm-edit-<?=$prod->id?> col-sm-6 col-md-4 col-lg-3 text-danger" > <i class="ti-arrow-circle-down" ></i>  </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>


                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="pagination-area d-flex justtify-content-center">
                        <?=$data['showPagination'];?>
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
                <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                </div>
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
                        <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                        <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a>
                        </li>
                        <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a>
                        </li>
                    </ul>
                    <ul class="m-t-20 chatonline">
                        <li><b>Chat option</b></li>
                        <li>
                            <a href="javascript:void(0)"><img src="../public/source/assets/images/users/1.jpg"
                                    alt="user-img" class="img-circle"> <span>Varun Dhavan <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../public/source/assets/images/users/2.jpg"
                                    alt="user-img" class="img-circle"> <span>Genelia Deshmukh <small
                                        class="text-warning">Away</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../public/source/assets/images/users/3.jpg"
                                    alt="user-img" class="img-circle"> <span>Ritesh Deshmukh <small
                                        class="text-danger">Busy</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../public/source/assets/images/users/4.jpg"
                                    alt="user-img" class="img-circle"> <span>Arijit Sinh <small
                                        class="text-muted">Offline</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../public/source/assets/images/users/5.jpg"
                                    alt="user-img" class="img-circle"> <span>Govinda Star <small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../public/source/assets/images/users/6.jpg"
                                    alt="user-img" class="img-circle"> <span>John Abraham<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../public/source/assets/images/users/7.jpg"
                                    alt="user-img" class="img-circle"> <span>Hritik Roshan<small
                                        class="text-success">online</small></span></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><img src="../public/source/assets/images/users/8.jpg"
                                    alt="user-img" class="img-circle"> <span>Pwandeep rajan <small
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

<div id="confirm">
    <div class="message"></div>
    <button class="yes">Yes</button>
    <button class="no">No</button>
</div>


