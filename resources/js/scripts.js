$(document).ready(function(){
    $('#clickme').click(function(){
        alert('a');
    });

    //Create form
    $("input[name=price]").focusout(function(){
        var price = $(this).val();
        var formatted = $.number( price, 0, ',', '.' );
        $(this).val(formatted);
    })

    $('.exit').click(function(){
        $confirm = confirm("Are you sure you want to exit this page? Everything you change will be saved!");
        if($confirm == false){
            return false;
        }
    });

    $('button[name=delete]').click(function(){
        $confirm = confirm("Are you sure you want to delete this record?");
        var del_button = $(this);
        var id = del_button.attr('id');
        var link = del_button.attr('link');
        var token = $("meta[name='csrf-token']").attr("content");

        if($confirm == true){
            $.ajax({
                type:'DELETE',
                url: link,
                data:{id:id,'_method':'DELETE',_token: token},
                success:function(data){
                    //alert(data.success);
                    $("div."+id).fadeOut('slow');
                }
            });
        }else{

        }
    });

    $('.ajax-update').click(function(){
        var active = $(this);
        var value = active.attr('value');
        var send;
        var link = active.attr('url');
        var token = $("meta[name='csrf-token']").attr("content");
        var id = active.attr('id-pro');
        var field = active.attr('field');
        if(value == 1){
            send = 0;
            active.html('Deactivated');
        }
        else{
            send = 1;
            active.html('Activated');
        }

        $.ajax({
            type: 'POST',
            url: link,
            data:{send:send,id:id,field:field,'_method':'POST',_token: token},
            success:function(data){
                alert(data);
            }
        });

    });

});
