@extends('admin.layouts.layout')

@section('content')
<div class="span9" id="content">
    <div class="row-fluid">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Вход в панель администратора</h4>
            Вход в панель администратора выполнен удачно</div>
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="breadcrumb">
                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
                    <li>
                        <a href="/">Главная</a> <span class="divider">.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Статистика</div>
                <div class="pull-right"><span class="badge badge-warning">View More</span>

                </div>
            </div>
            <div class="block-content collapse in">
                <div class="span3">
                    <div class="chart" data-percent="73">{{$countZayavkiToday}}</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Заявок за сегодня</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-percent="53">{{$countZayavki}}</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Всего заявок</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-percent="83">{{$countNews}}</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Всего новостей</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-percent="13">{{$countFiles-1}}</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Файлов на сервере</span>

                    </div>
                </div>
            </div>
        </div>
        <!-- /block -->
    </div>
    <div class="row-fluid">
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Последние новости</div>
                    <div class="pull-right"><span class="badge badge-info">{{$countNews}}</span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Заголовок</th>
                            <th>Текст</th>
                            <th>Дата создания</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach($articles as $article)
                            <?php $i++;
                            if ($i > 3) break; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td><a href="/admin/news/{{$article->id}}">{{$article->title}}</a></td>
                                <td>{{substr(strip_tags($article->text), 0, 25)}}</td>
                                <td>{{$article->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /block -->
        </div>
        <div class="span6">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Последние заявки</div>
                    <div class="pull-right"><span class="badge badge-info">{{$countZayavki}}</span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Номер телефона</th>
                            <th>Комментарий пользователя</th>
                            <th>Дата создания</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 0; ?>
                        @foreach($zayavki as $zayavka)
                            <?php $i++;
                            if ($i > 3) break; ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td><a href="/admin/zayavki/{{$zayavka->id}}">{{$zayavka->number}}</a></td>
                                <td>{{substr($zayavka->comment, 0, 44)}}</td>
                                <td>{{$zayavka->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Загруженые скрины</div>
                <div class="pull-right"><span class="badge badge-info">{{count($gallery)}}</span>

                </div>
            </div>
            <div class="block-content collapse in">
                <div class="row-fluid padd-bottom">
                    <?php $i = 0 ?>
                    @foreach($gallery as $image)
                        @if($image != "inputScans/.DS_Store")
                            <?php $i++ ?>
                            @if($i == 1 || ($i % 4) == 1) <div class="row-fluid padd-bottom"> @endif

                                <div class="span3">
                                    <a href="{{asset('')}}storage/{{$image}}" class="thumbnail">
                                        <img src="{{asset('')}}storage/{{$image}}" alt="" style="width: 260px; height: 180px; object-fit: cover;" data-jslghtbx>
                                    </a>
                                </div>
                                @if(($i % 4) == 0)</div>@endif
                        @endif
                    @endforeach
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
    <link href="{{asset('')}}vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen">
    <link href="{{asset('')}}assets/styles.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="{{asset('')}}vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <link rel="stylesheet" href="{{asset('')}}css/lightbox.css">
@endsection

@section('js')

    <script src="{{asset('')}}vendors/jquery-1.9.1.min.js"></script>
    <script src="{{asset('')}}js/bootstrap.min.js"></script>
    <script src="{{asset('')}}vendors/easypiechart/jquery.easy-pie-chart.js"></script>
    <script src="{{asset('')}}assets/scripts.js"></script>
    <script>
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
    </script>
    <script src="{{asset('')}}js/lightbox.js" type="text/javascript"></script>
    <script>
        var lightbox = new Lightbox();
        lightbox.load();
    </script>
@endsection
