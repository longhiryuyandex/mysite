$(document).ready(function(){
    $('#clickme').click(function(){
        alert('a');
    });

    $('.delete').on('click', function (e) {
        if (!confirm('Are you sure you want to delete?')) return;
        e.preventDefault();
        $('form.delete' + $(this).data('form')).submit();
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
});
