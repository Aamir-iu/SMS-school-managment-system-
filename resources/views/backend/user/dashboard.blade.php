<!-- Master page  -->
@extends('backend.layouts.master')

<!-- Page title -->
@section('pageTitle') Dashboard @endsection
<!-- End block -->

<!-- Page body extra class -->
@section('bodyCssClass') @endsection
<!-- End block -->

<!-- BEGIN PAGE CONTENT-->
@section('pageContent')
    <!-- Main content -->
@section("style")
<link href='<?php echo url('/');?>/css/custom.min.css' rel='stylesheet'>
<link href='<?php echo url('/');?>/font-awesome/css/font-awesome.min.css' rel='stylesheet'>
<!-- <link href="{{ mix('/css/app.css') }}" rel="stylesheet" type="text/css"> -->

<style>
.fc-today{
  background-color: #2AA2E6;
  color:#fff;


}
.fc-button-today
{
  display: none;
}
.green{
  color: #1ABB9C;
}

</style>
@stop
@section('content')
@if (Session::get('accessdined'))
<div class="alert alert-danger">
  <button data-dismiss="alert" class="close" type="button">×</button>
  <strong>Process Faild.</strong> {{ Session::get('accessdined')}}

</div>
@endif
<section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <div class="small-box ">
                    <a class="small-box-footer bg-orange-dark" href="/student/list">
                        <div class="icon bg-orange-dark" style="padding: 9.5px 18px 8px 18px;">
                            <i class="fa icon-student"></i>
                        </div>
                        <div class="inner ">
                            <h3 class="text-white">
                              {{$total['student']}}</h3>
                            <p class="text-white">
                                Student </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box ">
                    <a class="small-box-footer bg-pink-light" href="/class/list">
                        <div class="icon bg-pink-light" style="padding: 9.5px 18px 8px 18px;">
                            <i class="fa icon-teacher"></i>
                        </div>
                        <div class="inner ">
                            <h3 class="text-white">
                            {{$total['class']}}</h3>
                            <p class="text-white">
                                Class </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box ">
                    <a class="small-box-footer bg-teal-light" href="/subject/list">
                        <div class="icon bg-teal-light" style="padding: 9.5px 18px 8px 18px;">
                            <i class="fa icon-subject"></i>
                        </div>
                        <div class="inner ">
                            <h3 class="text-white">
                              {{$total['subject']}}
                            </h3>
                            <p class="text-white">
                                Subject </p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <div class="small-box ">
                    <a class="small-box-footer bg-purple-light" href="#">
                        <div class="icon bg-purple-light" style="padding: 9.5px 18px 8px 18px;">
                            <i class="fa icon-subject"></i>
                        </div>
                        <div class="inner ">
                            <h3 class="text-white">
                                 0                  </h3>
                            <p class="text-white">
                                Books </p>
                        </div>
                    </a>
                </div>
            </div>
</div>
 </section>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <!-- /top tiles -->
    <div class="row tile_count text-center">
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-2x fa-home green"></i>     Class</span>
        <div class="count red">{{$total['class']}}</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-2x fa-users green"></i> Students</span>
        <div class="count blue">{{$total['student']}}</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-2x fa-file green"></i> Subjects</span>
        <div class="count yellow">{{$total['subject']}}</div>
      </div>
    </div>
    <div class="row tile_count text-center">
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-2x fa-edit green"></i> Attendance(Days)</span>
        <div class="count red">{{$total['attendance']}}</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-2x fa-pencil green"></i> Exams</span>
        <div class="count blue">{{$total['exam']}}</div>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-6 tile_stats_count">
        <span class="count_top"><i class="fa fa-2x fa-book green"></i> Books</span>
        <div class="count yellow">{{$total['book']}}</div>
      </div>
    </div>
    <!-- /top tiles -->
    <!-- Graph start -->
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Accounting Report<small>(Monthly)</small></h2>
            <label class="total_bal">
              Balance: 
            </label>
            <div class="clearfix"></div>
          </div>
          <div class="x_content"><iframe class="chartjs-hidden-iframe" style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
            <canvas height="136" id="lineChart" width="821" style="width: 821px; height: 136px;"></canvas>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>



@stop
@section("script")
<script src="<?php echo url('/');?>/js/Chart.min.js"></script>

<!-- <script>
Chart.defaults.global.legend = {
  enabled: false
};

// Line chart
   var ctx = document.getElementById("lineChart");
   var lineChart = new Chart(ctx, {
     type: 'line',
     data: {
       labels: ["<?php //echo join($incomes['key'], '","')?>"],
       datasets: [{
         label: "Income",
         backgroundColor: "rgba(38, 185, 154, 0.31)",
         borderColor: "rgba(38, 185, 154, 0.7)",
         pointBorderColor: "rgba(38, 185, 154, 0.7)",
         pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
         pointHoverBackgroundColor: "#fff",
         pointHoverBorderColor: "rgba(220,220,220,1)",
         pointBorderWidth: 1,
         data: [<?php //echo join($incomes['value'], ',')?>]
       }, {
         label: "Expence",
         backgroundColor: "rgba(3, 88, 106, 0.3)",
         borderColor: "rgba(3, 88, 106, 0.70)",
         pointBorderColor: "rgba(3, 88, 106, 0.70)",
         pointBackgroundColor: "rgba(3, 88, 106, 0.70)",
         pointHoverBackgroundColor: "#fff",
         pointHoverBorderColor: "rgba(151,187,205,1)",
         pointBorderWidth: 1,
         data: [<?php  //echo join($expences['value'], ',')?>]
       }]
     },
   });



</script> -->

<script type="text/javascript">
        $(document).ready(function () {
          var ctx = document.getElementById("lineChart");
            var config = {
                type: 'line',
                data: {
                    labels: ["<?php echo join($incomes['key'], '","')?>"],
                    datasets: [{
                        label: "Income",
                        backgroundColor: "#82E0AA",
                        borderColor: "#58D68D",
                        pointBorderColor: "#28B463",
                        pointBackgroundColor: "#2ECC71",
                        pointHoverBackgroundColor: "#82E0AA",
                        pointHoverBorderColor: "#58D68D",
                        pointBorderWidth: 1,
                        data: [<?php echo join($incomes['value'], ',')?>]
                    }, {
                        label: "Expence",
                        backgroundColor: "#F1948A",
                        borderColor: "#EC7063",
                        pointBorderColor: "#CB4335",
                        pointBackgroundColor: "#E74C3C",
                        pointHoverBackgroundColor: "#F1948A",
                        pointHoverBorderColor: "#EC7063",
                        pointBorderWidth: 1,
                        data: [<?php echo join($expences['value'], ',')?>]
                    }]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                    },
                    hover: {
                        mode: 'index'
                    }
                }
            };
           
            var ctx = document.getElementById('lineChart').getContext('2d');
            var attendanceChart = new Chart(ctx, config);
            $('#calendar').fullCalendar({
                defaultView: 'month',
                height: 300,
                contentHeight: 250
            });
        });
    </script>

@stop

@endsection
<!-- END PAGE JS-->
