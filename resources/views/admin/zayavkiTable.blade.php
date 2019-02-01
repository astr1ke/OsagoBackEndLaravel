@extends('admin.layouts.layout')

@section('content')
    <div class="span9" id="content">
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Просмотр заявок</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <div class="table-toolbar">
                        </div>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Номер телефона</th>
                                <th>Комент пользователя</th>
                                <th>Дата создания</th>
                                <th>Действие</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0; ?>
                            @foreach($zayavki as $zayavka)
                                <?php $i++ ?>
                                <tr class="odd gradeX" >
                                    <td>{{$i}}</td>
                                    <td><a href="/admin/zayavki/{{$zayavka->id}}">{{$zayavka->number}}</a></td>
                                    <td>{{$zayavka->comment}}</td>
                                    <td>{{$zayavka->created_at}}</td>
                                    <td class="center">
                                        <div class="btn-group">
                                            <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle">Выполнить<span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="/admin/deleteZayavka/{{$zayavka->id}}" onClick="return window.confirm('Подтвердите удаление?');">Удалить</a></li>
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



