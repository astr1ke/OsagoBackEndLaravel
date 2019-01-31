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
                    <div class="chart" data-percent="73">73%</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Visitors</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-percent="53">53%</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Page Views</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-percent="83">83%</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Users</span>

                    </div>
                </div>
                <div class="span3">
                    <div class="chart" data-percent="13">13%</div>
                    <div class="chart-bottom-heading"><span class="label label-info">Orders</span>

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
                    <div class="muted pull-left">Users</div>
                    <div class="pull-right"><span class="badge badge-info">1,234</span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Vincent</td>
                            <td>Gabriel</td>
                            <td>@gabrielva</td>
                        </tr>
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
                    <div class="muted pull-left">Orders</div>
                    <div class="pull-right"><span class="badge badge-info">752</span>

                    </div>
                </div>
                <div class="block-content collapse in">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Coat</td>
                            <td>02/02/2013</td>
                            <td>$25.12</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacket</td>
                            <td>01/02/2013</td>
                            <td>$335.00</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Shoes</td>
                            <td>01/02/2013</td>
                            <td>$29.99</td>
                        </tr>
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
                <div class="muted pull-left">Gallery</div>
                <div class="pull-right"><span class="badge badge-info">1,462</span>

                </div>
            </div>
            <div class="block-content collapse in">
                <div class="row-fluid padd-bottom">
                    @foreach($gallery as $image)
                        @if($image != "ВходящиеСканы/.DS_Store")
                            <div class="span3">
                                <a href="#" class="thumbnail">
                                    <img src="storage/{{$image}}" alt="" style="width: 260px; height: 180px; object-fit: cover;" >
                                </a>
                            </div>
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

@endsection
