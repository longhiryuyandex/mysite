$(document).ready(function(){
    $('.datetime').datetimepicker({
        format:'d.m.Y',
        lang:'vn'
    });

    var token = $("meta[name='csrf-token']").attr("content");

    //Create form
    $("input[name=price]").focusout(function(){
        var price = $(this).val();
        var formatted = $.number( price, 0, ',', '.' );
        $(this).val(formatted);
    })

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

    ajaxUpdate(); // Check when page start, to change color
    $('.ajax-active').each(function(){
        $(this).on("click", function(){
            var active = $(this);
            var id = active.attr('id-pro');
            $.ajax({
                type: 'POST',
                url:  'products/ajax',
                data: {id:id,field:'active','_method':'POST',_token: token},
                success:function(data){
                    if(data == 1){
                        active.removeClass('text-danger');
                        active.addClass('text-success');
                        active.html('Activated');
                    }else if(data == 0){
                        active.removeClass('text-success');
                        active.addClass('text-danger');
                        active.html('Deactivated');
                    }

                    toastr.success('Status changed successfully!');
                }
            });
        });
    });

   



});

function ajaxUpdate(){
    $('.ajax-active').each(function(){
        var active = $(this).html();
        if(active == "Activated"){
            $(this).addClass('text-success');
        }else{
            $(this).addClass('text-danger');
        }
    });
}
