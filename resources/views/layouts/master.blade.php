<!-- Stored in resources/views/layouts/master.blade.php -->
<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{asset('./plugins/fancybox-master/dist/jquery.fancybox.min.css')}}" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
        <header></header>
        <div class="container-fluid">
            <div class="row h-100">
                <div class="header col-md-12 bg-info">
                    TRE Furniture Admin Page
                </div>
                <div class="sidebar col-md-2 h-100 bg-dark">
                    This is sidebar
                </div>
                <div class="content col-md-10">
                    @yield('content')
                </div>
            </div>
        </div>
    </body>
</html>


<script src="{{ URL::asset('js/app.js') }}"></script>
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('plugins/fancybox-master/dist/jquery.fancybox.min.js')}}"></script>
<script>


CKEDITOR.replace('desc',{
    filebrowserBrowseUrl : '../../../plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    filebrowserUploadUrl : '../../../plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    filebrowserImageBrowseUrl : '../../../plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
});


    $(document).ready(function(){
        $('.iframe-btn').fancybox({
		'width'   : 880,
		'height'  : 570,
		'type'    : 'iframe',
		'autoScale'   : false
		});

        $("[data-fancybox]").fancybox({
            iframe : {
                css : {
                    width : '880px',
                    height: '550px',
                    autoScale: true
                }
            }
        });
    });

    function responsive_filemanager_callback(field_id){
        //console.log(field_id);
        var url=jQuery('#'+field_id).val();
        var imgURL = url.replace(/https?:\/\/[^\/]+/i, "");
        //alert(imgURL);
        //alert('update '+field_id+" with "+url);
        //var src = $("image."+field_id).attr('src');
        $("img#view-img").attr('src', url);
        //alert(src);
        $('input#'+field_id).val(imgURL);
    }
</script>
