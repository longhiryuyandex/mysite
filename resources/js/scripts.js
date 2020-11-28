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
        if($confirm == false){
            return false;
        }else{
            var id = $(this).attr('id');
            var link = $(this).attr('link');
            var token = $("meta[name='csrf-token']").attr("content");
            $.ajax({
                type:'DELETE',
                url: link,
                data:{id:id,'_method':'DELETE',_token: token},
                success:function(data){
                    //alert(data.success);
                    $(this).parents('.row').hide('slow');
                }
            });
        }
    });

});
