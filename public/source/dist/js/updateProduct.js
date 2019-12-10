$(document).ready(function(){
    let id = 0;
    let  imageVal = 0;
    $('.edit-icon').click(function(){
        id= $(this).attr('data-id');
        // console.log(id);
        $(this).hide();
        $('.trash-'+id).hide();
        $('.confirm-edit-'+id).show();
        $('.inputChildPHP-'+id).hide();
        $('.input-text-colr-'+id).show();
    })
        // to get the file submited
    $('.submit-img-form').click(function(e){
        let files = new FormData(); // data 'bag'
        console.log($('#fileImage'+id)[0].files[0]);
        url = "http://localhost/shopping-page-master/public/updateProductController/upLoadFile"; 
                        // append selected file to the bag named 'file'
        files.append('fileName',$('#fileImage'+id)[0].files[0]);
        
        $.ajax({
            type: 'post',
            url : url,
            processData : false,
            contentType : false,
            data: files,
            dataType : 'JSON',
            success :   function (response){
                console.log('start_exist : '+response.exist)
                console.log('start_filename : '+response.filename);
                if(response.success){
                    $('#image-'+id).text(response.filename);
                    imageVal = response.filename;
                    $('.notYetChooseImageText').hide();
                    $('.chosenImageText').show();

                }
                else if(response.exist == '1'){
                    alert('file have exist in DB, change by an exist image ?');
                    imageVal = response.filename;
                    $('.notYetChooseImageText').hide();
                    $('.chosenImageText').show();
                }
                else{
                        alert('upload failed! '+response.message);                        
                }
                console.log('check_filename : '+response.filename);
                console.log('globle var imageVal :'+imageVal);
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    $('.confirm-edit').click(function(){
        let editId = $(this).attr('confirm-id');             
        let editName = $('#name-'+editId).val();
        let editCate = $('#cateName-'+editId).val();
        let editPrice = $('#price-'+editId).val();
        let editPromtPrice = $('#promtPrice-'+editId).val();
        let editPromotion = $('#promotion-'+editId).val();
        let editImage = imageVal;
        imageVal = 0;
        let editStatus = $('#status-'+editId+':checked').val();
        let editNew = $('#new-'+editId+':checked').val();
        let editDate = $('#update-at-'+editId).val();
        console.log('status: '+editStatus);
        console.log('new: '+editNew);
        if( editStatus != null){ // also ok !
        // if( typeof(editStatus) !== 'undefined'){
            // console.log('not null');
            editStatus  = true;
        }
        else {
            editStatus = false;
        }
        if( editNew != null){ // also ok !
            editNew  = true;
        }
        else {
            editNew = false;
        }
        $('.inputChildPHP-'+editId).show();
        $('.input-text-colr-'+editId).hide();
        // alert('success');
        $.ajax({
            url : "http://localhost/shopping-page-master/public/updateProductController/AjaxUpdateProduct",
            type : 'POST',
            data : {
                id : editId,
                name : editName,
                type : editCate,
                price : editPrice,
                promtPrice : editPromtPrice,
                promotion : editPromotion,
                image : editImage,
                status : editStatus,
                new : editNew,
                date : editDate,
                action : 'updateDB'
            },
            dataType : 'JSON',
            success: function(response){
                // show the text
                if(response.success) {
                    $('#name-PHP-'+editId).text(response.name)
                    $('#cateName-PHP-'+editId).text(response.type)
                    $('#price-PHP-'+editId).text(response.price)
                    $('#promtPrice-PHP-'+editId).text(response.prmtPrice)
                    $('#promotion-PHP-'+editId).text(response.promotion)
                    if(response.image != '0'){
                        $('#image-PHP-'+editId).children().attr('src','../public/source/assets/products-images/'+response.image)
                    }
                        $('#status-PHP-'+editId).removeAttr("checked");
                    if(response.status === 1){
                        $('#status-PHP-'+editId).attr("checked",'true');
                    }
                    else{
                        $('#status-PHP-'+editId).removeAttr("checked");
                    } 
                    if(response.new === 1){
                        $('#new-PHP-'+editId).attr("checked",'true');
                    }
                    else{
                        $('#new-PHP-'+editId).removeAttr("checked");
                    } 
                    $('#update-at-PHP-'+editId).text(response.date)
                }
            },
            error: function(){
                alert('error');
            },
        })
        $(this).hide();
        $('.edit-icon-'+editId).show();
        $('.trash-'+editId).show();
    })
})

function functionConfirm(msg, myYes, myNo) {
    var confirmBox = $("#confirm");
    confirmBox.find(".message").text(msg);
    confirmBox.find(".yes,.no").unbind().click(function(event) {
        confirmBox.hide();
        // let click = event.target.className;
        // console.log(click);
        // if (click == 'yes'){
        //     console.log('choose yes if');
        // }  else if (click == 'no'){
        //     console.log('choose no if');
        // }
    });        
    confirmBox.find(".yes").click(myYes);
    confirmBox.find(".no").click(myNo);    
    confirmBox.show();
}
$('.ti-trash').click(function(){
    let trashId = $(this).attr('data-id');
    functionConfirm(" Do you really want to detele this product?",
        function yes(event){
            console.log(event.target.className);
            $.ajax({
                url :"http://localhost/shopping-page-master/public/updateProductController/deleteProduct",
                type : 'POST',
                data : {
                    id : trashId,
                    action :'deleteProduct'

                },
                dataType : 'JSON',
                success : function(response){
                    if(response.action == 'updateStatus'){
                        if(response.success){
                        alert('response success : '+ response.message);
                        }else{
                            alert('response : '+ response.message);

                        }
                    }else if(response.action  == 'deletePermanently' ){
                        alert('delete product :'+response.name+' | id: '+response.id)
                        $('.tabdData-'+response.id).hide();

                    }
                },
                error : function(){  
                    alert(response.message)
                }
            })
        },
        function no(){
            console.log(event.target.className);
        });
})

