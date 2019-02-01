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
                            <div class="btn-group pull-right">
                                <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Print</a></li>
                                    <li><a href="#">Save as PDF</a></li>
                                    <li><a href="#">Export to Excel</a></li>
                                </ul>
                            </div>
                        </div>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                            <thead>
                            <tr>
                                <th>Заголовок</th>
                                <th>Текст Статьи</th>
                                <th>Главная картинка</th>
                                <th>Активна (да/нет)</th>
                                <th>Дата создания</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                    <tr class="odd gradeX" >
                                        <td><a href="/admin/news/{{$article->id}}">{{$article->title}}</a></td>
                                        <td>{{strip_tags($article->text)}}</td>
                                        <td>
                                            <img class="jslghtbx-thmb tbl_img" src="{{asset('')}}storage/{{$article->file}}" alt="" data-jslghtbx>
                                        </td>
                                        <td class="center">@if ($article->isActive) Да @else Нет @endif</td>
                                        <td>{{$article->created_at}}</td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Выполнить<span class="caret"></span></button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="/admin/addNews/{{$article->id}}">Редактировать</a></li>
                                                    <li><a href="/admin/deleteNews/{{$article->id}}" onClick="return window.confirm('Подтвердите удаление?');">Удалить</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="/admin/activateNews/{{$article->id}}">Активировать</a></li>
                                                    <li><a href="/admin/deactivateNews/{{$article->id}}">Деактивировать</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
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



