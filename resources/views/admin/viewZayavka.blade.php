@extends('admin.layouts.layout')

@section('content')
    <div class="span9" id="content">
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Просмотр выбранной заявки</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <div class="table-toolbar">
                            <div style="margin-bottom: 30px">
                                <div class="control-group">
                                    <label class="control-label">Номер телефона</label>
                                    <div class="controls">
                                        <span class="input-xlarge uneditable-input">{{$zayavka->number}}</span>
                                    </div>
                                    <label class="control-label">Коментарий пользователя</label>
                                    <div class="control-group">
                                        <label class="control-label" for="textarea2"></label>
                                        <div class="controls">
                                            <textarea class="input-xlarge textarea" placeholder="Enter text ..." style="width: 810px; height: 200px">{{$zayavka->comment}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <!-- block -->
                                <div class="block">
                                    <div class="navbar navbar-inner block-header">
                                        <div class="muted pull-left">Загруженые скрины</div>
                                        <div class="pull-right"><span class="badge badge-info">{{count($images)}}</span>

                                        </div>
                                    </div>
                                    <div class="block-content collapse in">
                                        <?php $i = 0 ?>
                                        @foreach($images as $image)
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
                                <!-- /block -->
                            </div>
                            <div class="btn-group">
                                <a href="/admin/deleteZayavka/{{$zayavka->id}}"><button class="btn btn-success">Удалить заявку</button></a>
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



