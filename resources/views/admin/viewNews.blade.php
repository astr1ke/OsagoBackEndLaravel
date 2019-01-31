@extends('admin.layouts.layout')

@section('content')
    <div class="span9" id="content">
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Список статей в базе</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <div class="table-toolbar">
                            <div style="margin-bottom: 30px">
                                <img style="max-height: 245px; max-width: 450px"  src="{{asset('')}}storage/{{$article->file}}" alt="">
                                <H3>{{$article->title}}</H3>
                                {!! $article->text !!}
                            </div>
                            <div class="btn-group">
                                <a href="/admin/addNews/{{$article->id}}"><button class="btn btn-success">Редактировать статью</button></a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>
@endsection

@section('css')
    <link href="{{asset('')}}css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="{{asset('')}}css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="{{asset('')}}assets/styles.css" rel="stylesheet" media="screen">
    <link href="{{asset('')}}assets/DT_bootstrap.css" rel="stylesheet" media="screen">
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('')}}vendors/flot/excanvas.min.js"></script><![endif]-->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="{{asset('')}}http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="{{asset('')}}vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <link rel="stylesheet" href="{{asset('')}}css/lightbox.css">
    <style>
        .tbl_img {
            max-height: 50px;
            max-width: 50px;
            border-radius: 3px;
            margin: 0px;
        }
    </style>
@endsection

@section('js')
    <script src="{{asset('')}}vendors/jquery-1.9.1.js"></script>
    <script src="{{asset('')}}js/bootstrap.min.js"></script>
    <script src="{{asset('')}}vendors/datatables/js/jquery.dataTables.min.js"></script>


    <script src="{{asset('')}}assets/scripts.js"></script>
    <script src="{{asset('')}}assets/DT_bootstrap.js"></script>

    <script src="{{asset('')}}js/lightbox.js" type="text/javascript"></script>
    <script>
        var lightbox = new Lightbox();
        lightbox.load();
    </script>
@endsection



