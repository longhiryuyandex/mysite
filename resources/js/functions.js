function ajaxFunction(type,url,data){
    $.ajax({
        type: type,
        url: url,
        data:data,
        success:function(){
            return status;
        }
    });
}

function ajaxUpdate(){
    $('.ajax-update').each(function(){
        var activeValue = $(this).attr('value');
        if(activeValue == "1"){
            $(this).addClass('text-success');
        }else{
            $(this).addClass('text-danger');
        }
    });
}