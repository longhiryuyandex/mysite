<html>
    <head>
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
        <link rel="stylesheet" href="{{asset('./plugins/fancybox-master/dist/jquery.fancybox.min.css')}}" />

        <meta charset="UTF-8">
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')">
        <meta name="author" content="TRE Furniture">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js" integrity="sha512-3z5bMAV+N1OaSH+65z+E0YCCEzU8fycphTBaOWkvunH9EtfahAlcJqAVN2evyg0m7ipaACKoVk6S9H2mEewJWA==" crossorigin="anonymous"></script>

<script>
CKEDITOR.replace('desc',{
    filebrowserBrowseUrl : '../../../plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    filebrowserUploadUrl : '../../../plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',
    filebrowserImageBrowseUrl : '../../../plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr=',

    toolbar: [
	{ name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'ExportPdf', 'Print' ] },
	{ name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord' ] },
	{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
	'/',
	{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat' ] },
	{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
	{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
	{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak' ] },
	'/',
	{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
	{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
	{ name: 'others', items: [ '-' ] }
	//{ name: 'about', items: [ 'About' ] }
    ]
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
