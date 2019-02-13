@extends('admin.layouts.layout')

@section('content')
    <div class="span9">
        <div class="row-fluid">
            <div class="span12" id="content">

                <form action="{{asset('')}}admin/saveNews" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div>
                        <h2>Редактор статьи</h2>
                    </div>

                    <label class="control-label" for="typeahead">Заголовок </label>
                    <div class="controls">
                        <input type="text" name="title" class="span6" id="typeahead"  data-provide="typeahead" data-items="4" value="@if (isset($articles->title)) {{$articles->title}} @endif">
                    </div>

                    <div class="row-fluid">
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Текст статьи</div>
                            </div>
                            <div class="block-content collapse in">
                                <textarea name="text" id="ckeditor_full">@if (isset($articles->text)) {{$articles->text}} @endif </textarea>
                            </div>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="fileInput">Главная картинка новости</label>
                        <div class="controls">
                            <input class="input-file uniform_on" name="file" id="fileInput" type="file">
                        </div>
                    </div>

                    <input type="hidden" name="id" value="@if (isset($articles->id)) {{$articles->id}} @endif">

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('')}}vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css">
    <link href="{{asset('')}}css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="{{asset('')}}assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="{{asset('')}}vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>


@endsection

@section('js')


    <script src="{{asset('')}}vendors/bootstrap-wysihtml5/lib/js/wysihtml5-0.3.0.js"></script>
    <script src="{{asset('')}}vendors/jquery-1.9.1.min.js"></script>
    <script src="{{asset('')}}vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
    <script src="{{asset('')}}vendors/ckeditor/ckeditor.js"></script>
    <script src="{{asset('')}}vendors/ckeditor/adapters/jquery.js"></script>
    <script src="{{asset('')}}assets/scripts.js"></script>
    <script>
        $(function() {
            // Bootstrap
            $('#bootstrap-editor').wysihtml5();
            // Ckeditor standard
            $( 'textarea#ckeditor_standard' ).ckeditor({width:'98%', height: '150px', toolbar: [
                    { name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
                    [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],			// Defines toolbar group without name.
                    { name: 'basicstyles', items: [ 'Bold', 'Italic' ] }
                ]});
            $( 'textarea#ckeditor_full' ).ckeditor({width:'98%', height: '150px'});
        });
        // Tiny MCE
        tinymce.init({
            selector: "#tinymce_basic",
            plugins: [
                "advlist autolink lists link image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        });
        // Tiny MCE
        tinymce.init({
            selector: "#tinymce_full",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ]
        });
    </script>
@endsection




