$(document).ready(function(){
    var token = $("meta[name='csrf-token']").attr("content");

    $('.datetime').datetimepicker({
        format:'d.m.Y',
        lang:'vn'
    });

    $(".quick-view").click(function(){
        var id = $(this).attr('id-pro');
        $.ajax({
            type:'POST',
            dataType: "text",
            url: 'products/quick-view',
            data:{id:id,'_method':'POST',_token: token},
            success:function(data){
                $('#QuickView .modal-body').html(data);
                $("#QuickView").modal();
            }
        });

    });


    $("input[name=price]").focusout(function(){
        var price = $(this).val();
        var formatted = $.number( price, 0, ',', '.' );
        $(this).val(formatted);
    });

    $('.delete').on('click',function(){
        var del_button = $(this);
        var id = del_button.attr('id');
        var link = del_button.attr('link');
        $.confirm({
            title: 'Delete confirm!',
            content: 'Are you sure you want to delete this record?',
            type: 'red',
            buttons: {
                ok: {
                    text: "Yes, delete it!",
                    btnClass: 'btn-danger',
                    action: function(){
                        $.ajax({
                            type:'DELETE',
                            url: link,
                            data:{id:id,'_method':'DELETE',_token: token},
                            success:function(data){
                                //alert(data.success);
                                $("div."+id).fadeOut('slow');
                                toastr.warning('The record has been deleted!')
                            }
                        });
                    }
                },
                cancel: function(){
                    toastr.success('Nothing has been changed!');
                }
            }
        });
    });// end button delete click

    ajaxUpdate(); // Check when page start, to change color
    $('.ajax-active').each(function(){
        $(this).on("click", function(){
            var active = $(this);
            var id = active.attr('id-pro');
            var field = active.attr('field');
            $.ajax({
                type: 'POST',
                url:  'products/ajax',
                data: {id:id,field:field,'_method':'POST',_token: token},
                success:function(data){
                    if(data == 1){
                        active.removeClass('text-danger');
                        active.addClass('text-success');
                        active.html('Enabled');
                    }else if(data == 0){
                        active.removeClass('text-success');
                        active.addClass('text-danger');
                        active.html('Disabled');
                    }
                    toastr.success('Status changed successfully!');
                }
            });
        });
    });// End ajax-active each


}); // End Documment Ready

function ajaxUpdate(){
    $('.ajax-active').each(function(){
        var active = $(this).html();
        if(active == "Enabled"){
            $(this).addClass('text-success');
        }else{
            $(this).addClass('text-danger');
        }
    });
}
