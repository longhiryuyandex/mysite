$(document).ready(function () {
    $('.exit').click(function(){
        $confirm = confirm("Are you sure you want to exit this page? Everything you change will be saved!");
        if($confirm == false){
            return false;
        }
    });

    $('button[name=view]').click(function(){
        alert('a');
        $.confirm({
            title: 'What is up?',
            content: 'Here goes a little content',
            type: 'green',
            buttons: {
                ok: {
                    text: "ok!",
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function(){
                         console.log('the user clicked confirm');
                    }
                },
                cancel: function(){
                        console.log('the user clicked cancel');
                }
            }
        });
    });
});
