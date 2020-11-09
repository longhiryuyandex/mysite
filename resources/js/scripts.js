$(document).ready(function(){
    $('#clickme').click(function(){
        alert('a');
    });

    $('.delete').on('click', function (e) {
        if (!confirm('Are you sure you want to delete?')) return;
        e.preventDefault();
        $('form.delete' + $(this).data('form')).submit();
    });
});
