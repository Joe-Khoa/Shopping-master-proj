
      
    $(document).ready(function(){


        // --------------UPLOAD FILE----------------
            let newFileName  = '';
            $('.submit-img-form-newPro').click(function(){
                
                    let files = new FormData();
                    let fileData = $('#fileImage')[0].files[0];
                    // console.log(fileData);
                    url  = "http://localhost/shopping-page-master/public/updateProductController/upLoadFile"
                    files.append('fileName',fileData);
                    $.ajax({    
                        type : 'post',
                        url : url,
                        processData : false,
                        contentType : false,
                        data : files,
                        dataType : 'JSON',
                        success : function(response){
                            console.log('\n');
                            console.log('success : '+response.success);
                            console.log('exist : '+response.exist); 
                            console.log('file-name : '+response.filename);
                            if(response.success  === true || response.exist === 1){
                                newFileName = response.filename;
                                console.log(newFileName);
                                $('.notYetChooseNewImageText').hide();
                                $('.chosenNewImageText').show();
                                
                            }
                            
                        },
                        error: function(err){
                            console.log(err)
                        }
                    })
                })               
    
        // --------------------END UPLOAD FILE----------------------
    
            $('.create-btn').click(function(){
                let addProName = $('#prod-name-').val();
                let addProCate = $('#prod-cate-').val();
                let addProPrice = $('#prod-price-').val();
                let addProProProPrice = $('#prod-pro-price-').val();
                let addProPromtion= $('#prod-promotion-').val();
                let addProDetail = $('#prod-detail-').val();
                let addProStatus = $('#prod-status-'+':checked').val();
                let addProNew = $('#prod-new-'+':checked').val();
                let addProUpdateAt = $('#prod-update-at-').val();
               if(addProStatus != null){
                    addProStatus = 1;
               }else{
                   addProStatus = 0;
               }
               if(addProNew != null){
                    addProNew = 1;
               }else{
                    addProNew = 0;
               }
               console.log(addProStatus);
               console.log(addProNew);
                // addProUpdateAt = addProUpdateAt.split('-').reverse().join("-");
                console.log('\n');
                console.log(addProName);
                console.log(addProCate);
                console.log(addProPrice);
                console.log(addProProProPrice);
                console.log(addProPromtion);
                console.log(addProDetail);
                console.log(addProStatus);
                console.log(addProNew);
                console.log(addProUpdateAt);
                $.ajax({
                    url: 'http://localhost/shopping-page-master/public/NewProductController/addNewProduct' ,
                    type: 'POST',
                    data : {
                        action : 'addNewProduct',
                        name : addProName,
                        category : addProCate,
                        price : addProPrice,
                        proPrice : addProProProPrice,
                        promotion : addProPromtion,
                        detail : addProDetail,
                        image : newFileName,
                        status : addProStatus,
                        new : addProNew,
                        updateAt: addProUpdateAt
                    },
                    dataType : 'JSON',
                    success : function(response){
                        if(response.success){
                            alert('response success : '+ response.message);
                        }
                    },
                    error : function(){
                        alert('error')
                    }
                })
            })
    })
    
    








$(document).ready(function(){

    var newProductCard = $("        <tbody class='body-'>     \
                                        <tr class='tabdData '>  \
                                            <td>    \
                                                <textarea id='prod-name-' class='input-text-colr' cols='10' rows='5'    \
                                                    style='width:120px !important;'></textarea>    \
                                            </td>    \
                                            <td>    \
                                                <select id='prod-cate-' class='input-text-colr '>  <?php foreach($categories as $cate):?>    <option value='<?=$cate->name?>'><?=$cate->name?></option>  <?php endforeach;?>    </select>    \
                                            </td>    \
                                            <td>    \
                                                <input id='prod-price-' type='number' class='input-text-colr ' style='width:120px !important;'>    \
                                            </td>    \
                                            <td>    \
                                                <input id='prod-pro-price-' type='number' class='input-text-colr ' style='width:120px !important;'>    \
                                            </td>    \
                                            <td>    \
                                                <textarea id='prod-promotion-' class='input-text-colr ' cols='20' rows='10'    \
                                                    style='width:150px !important;'></textarea>    \
                                            </td>    \
                                            <td>    \
                                                <textarea id='prod-detail-' class='input-text-colr ' cols='20' rows='10'    \
                                                    style='width:150px !important;'></textarea>    \
                                            </td>    \
                                            <td>    \
                                                <div class='input-text-colr ' style='background-color:white; border: none; '>    \
                                                    <input type='file' name='fileToUpload' id='fileImage'>    \
                                                    <button class='submit-img-form-newPro mt-1' type=''    \
                                                        style='width:110px;font-size:13px;'>New/Change</button>    \
                                                </div>    \
                                            </td>    \
                                            <td>    \
                                                <input id='prod-status-' class='input-text-colr ' style='width:17px !important' type='checkbox' class=''    \
                                                    style='width:15px; height:15px;'>    \
                                            </td>    \
                                            <td>    \
                                                <input id='prod-new-' class='input-text-colr ' style='width:17px !important' type='checkbox' class=''    \
                                                    style='width:15px; height:15px;'>    \
                                            </td>    \
                                            <td>    \
                                                <input id='prod-update-at-' class='input-text-colr ' style='' type='date' value=''>    \
                                            </td>    \
                                        </tr>    \
                                    </tbody>    \ ");
    // $('.addmorePr').click(function(){
    //     $(".body-empty").before(newProductCard);
    // })
})