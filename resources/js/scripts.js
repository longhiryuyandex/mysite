$(document).ready(function () {
    $('.exit').click(function(){
        $confirm = confirm("Are you sure you want to exit this page? Everything you change will be saved!");
        if($confirm == false){
            return false;
        }
    });
});
