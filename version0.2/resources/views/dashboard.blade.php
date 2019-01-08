<!DOCTYPE html>

<html>
<head>
  @include('includes.head')
    <link rel="stylesheet" href="{{URL::asset('admin/css/base.css')}}">
    <link rel="stylesheet" href="{{URL::asset('admin/css/skin.css')}}">
 <style>
 .main-header .sidebar-toggle {
    content: none;
}
.main-header .navbar {
    -o-transition: margin-left 0.3s ease-in-out;
    transition: margin-left 0.3s ease-in-out;
    margin-bottom: 0;
    margin-left: 320px;
    border: none;
    padding: 15px 0;
    border-radius: 0;
}
.main-sidebar {
    position: absolute;
    top: 0;
    left: 0;
    padding-top: 100px;
    min-height: 100%;
    width: 320px;
    z-index: 810;
}
.content-wrapper{
	    margin-left: 320px;
}
.main-header {
    position: relative;
    max-height: 100px;
    z-index: 1030;
    background: #fff;
}
.main-header .logo {
    -o-transition: width 0.3s ease-in-out;
    transition: width 0.3s ease-in-out;
    display: block;
    float: left;
    font-size: 20px;
    line-height: 50px;
    text-align: center;
    width: 320px;
    font-family: 'Montserrat', sans-serif;
    padding: 0 15px;
    font-weight: 300;
    overflow: hidden;
}
.main-header .navbar {
    -o-transition: margin-left 0.3s ease-in-out;
    transition: margin-left 0.3s ease-in-out;
    margin-bottom: 0;
    margin-left: 320px;
    border: none;
    padding: 15px 0 10px;
    border-radius: 0;
}
.main-header .sidebar-toggle {
    padding: 19px 15px 10px;
    font-size: 25px;
}
.main-header .sidebar-toggle {
    float: left;
    background-color: transparent;
    background-image: none;
    font-family: 'Montserrat', sans-serif;
    margin-top: 4px;
}
.main-header .navbar-custom-menu {
    margin-right: 0px !important;
}
body {
    font-family: 'Montserrat', sans-serif !important;
 }
 .nav-tabs-custom{
 	box-shadow: none;
 }
 .dashboard{
 	padding: 25px;
 }
 .sidebar-menu > li > a {
    padding: 15px 5px 15px 15px;
    display: block;
}
</style>
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    @include('includes.header')
  </header>

  <aside class="main-sidebar">
    @include('includes.sidebar')
  </aside><!-- left-side menu -->

  <div class="content-wrapper">

    <section class="content container-fluid dashboard">

        <div class="nav-tabs-custom">
            <div class="tab-content">
                <div class="tab-pane active" id="day">
                    
                    <div class="col-md-12">
                        <div class="row">
                           
                            <div class="col-md-4 col-xs-12">
                              <div class="card">
                                <h3 class="title">Revenue</h3>
                                <p class="lead"><span>35%</span> from last one month</p>

                                <div class="stats">
                                    <h1>23,654
                                        <i class="icon up-arrow"></i>
                                        <span class="circle pull-right">
                                            <i class="icon dollar icon-lg"></i>
                                        </span>
                                    </h1>
                                </div>
                              </div><!-- card -->
                            </div>

                            <div class="col-md-4 col-xs-12">
                              <div class="card">
                                <h3 class="title">Unique Visitors</h3>
                                <p class="lead"><span>28%</span> from last 24 hours</p>
                                

                                <div class="stats">
                                    <h1>3,423
                                        <i class="icon up-arrow"></i>
                                        <span class="circle pull-right">
                                            <i class="icon graph icon-lg"></i>
                                        </span>
                                    </h1>
                                </div>
                              </div><!-- card -->
                            </div>

                            <div class="col-md-4 col-xs-12">
                              <div class="card">
                                <h3 class="title">Downloads</h3>
                                <p class="lead"><span>16.3%</span> from last month</p>
                                
                                <div class="stats">
                                    <h1>
                                      <span class="pull-left">
                                        <span class="apple">
                                            <i class="icon apple"></i> <span>35,432</span>
                                        </span>
                                        <span class="android">
                                            <i class="icon android"></i> <span>65,786</span>
                                        </span>
                                      </span>
                                       
                                      <span class="circle pull-right">
                                          <i class="icon cloud icon-lg"></i>
                                      </span>
                                    </h1>
                                </div>
                              </div><!-- card -->
                            </div>  
                                                      
                        </div><!--/.row-->
                    </div><!--/.col-md-12-->
                    

                    <div class="col-md-12">
                        <div class="row">                                        
                    
                            <div class="col-lg-8 col-md-8 col-xs-12">
                              <div class="box box-primary hours-usage">
                                <div class="box-header">
                                  <h3 class="box-title">Number Of User</h3>

                                  <div class="box-tools pull-right">
                                    <span class="light-text">Total: <span class="medium-text">{{$total}}</span> Users</span>
                                  </div>
                                </div>
                                <div class="box-body chart-responsive line-chart">
                                   <canvas id="lineChart"></canvas> 
                                </div>
                                <!-- /.box-body -->
                              </div>
                            </div> 
                            
                            <div class="col-lg-4 col-md-4 col-xs-12">
                              <div class="box box-primary platform-usage">
                                <div class="box-header">
                                  <h3 class="box-title">Platform Usage</h3>
                                </div>
                                <div class="box-body chart-responsive pie-doughnut">
                                   <canvas id="doughnut"></canvas>
                                   <span class="platform-usage">
                                       <span class="percentage">68%</span>
                                       <span class="device-type">Android</span>
                                   </span>
                                </div>
                                <!-- /.box-body -->
                              </div>
                            </div>  
                          
                        </div><!--/.row-->
                    </div><!--/.col-md-12-->
                          
<!--                           
                    <div class="col-md-12">
                        <div class="row">   
                           
                            <div class="col-lg-12 col-xs-12">
                              <div class="box box-primary">
                                <div class="box-header">
                                  <h3 class="box-title">Paid / Unpaid Users</h3>
                                  <div class="box-tools pull-right">
                                    <span><span class="dot green"></span> Paid <span class="dot pink"></span> Unpaid</span>
                                  </div>
                                </div>
                                <div class="box-body chart-responsive">
                                  
                                  <div class="row">
                                      <div class="col-md-4 col-xs-12">
                                         <div class="pie-chart">
                                          <canvas id="pie"></canvas>
                                          
                                          <span class="paid-unpaid-user-percent">
                                               <span class="paid-user">
                                                   <span class="percent">55%</span>
                                                   <span class="type">Paid</span>
                                               </span>

                                               <span class="unpaid-user">
                                                   <span class="percent">45%</span>
                                                   <span class="type">Unpaid</span>
                                               </span>
                                          </span>
                                          
                                         </div>
                                      </div>
                                      
                                      <div class="col-md-8 col-xs-12">
                                          <canvas id="line"></canvas>
                                      </div>
                                  </div>/.row-->
                                  
<!--                                 </div>
                                 /.box-body -->
                             <!--  </div>
                            </div>   
                        </div> --><!--/.row-->
                        
<!--                        <div class="col-md-12 figures-box">
                           <div class="col-lg-4 col-sm-4 col-xs-12 figures">
                               <span>Total Users</span>
                               <span>313,174</span>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-xs-12 figures">
                               <span>Total Paid Users</span>
                               <span>256,691</span>
                           </div>

                           <div class="col-lg-4 col-sm-4 col-xs-12 figures">
                               <span>Total Unpaid Users</span>
                               <span>56,483</span>
                           </div>
                       </div>/.row-->
                    <!-- </div> --><!--/.col-md-12-->
                                                                             
                </div><!-- 24 Hours -->
                
                <div class="tab-pane" id="tab_2">
                    Two
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    Three
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div><!--/.nav-tabs-custom-->  

    </section><!-- /.content -->
  </div><!-- /.content-wrapper -->

<footer class="main-footer">
@include('includes.footer') 
</footer>

</div>
<!-- ./wrapper -->
@php
$graphdata=implode(',',array_keys($calender));
$graphdata=rtrim($graphdata,',');
$calenderdata= implode(',',($calender));
$calenderdata=rtrim($calenderdata,',');
@endphp

@include('includes.foot')
<script src="{{URL::asset('admin/js/Chart.bundle.js')}}"></script>
<script>
    
/* line chart */
var ctx = document.getElementById('lineChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        scaleOverride:true,
        scaleSteps:5,
        scaleStartValue:0,
        scaleStepWidth:20,
        labels:[<?php echo $graphdata; ?>] ,
        xAxisID:'Number Of Users',
        yAxisID:'Month Of Date',
        datasets: [{
            pointHoverRadius:'7',
            pointHoverBackgroundColor:'rgb(193, 16, 131)',
            pointBackgroundColor:'#ffffff',
            pointBorderColor:'rgb(193, 16, 131)',
            pointRadius:'5',
            pointBorderWidth:'2',
            backgroundColor:'rgba(193, 16, 131,0.1)',
            borderColor:'rgb(193, 16, 131)',
            borderWidth:'2',
            data: [<?php echo $calenderdata; ?>],
        }]
    },

    options: {
        tooltips: {
            mode: 'point',
            intersect: true,
            cornerRadius: 0,
            bodySpacing: 10,
            xPadding: 15,
            yPadding: 10
        },
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Date Of The Month'
                },
                gridLines: {
                    display: false,
                }
            }],
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'Number Of User'
                },
                gridLines: {
                    color: '#f9f9f9'
                }
            }]
        }
    }
});


/* donut chart */
var ctx = document.getElementById('doughnut').getContext('2d');
var chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: [" iOS ", " Android "],
        datasets: [{
            backgroundColor: ['#C11083', '#78C904'],
            data: [32, 68],
            borderWidth: 0,
        }]
    },
    options: { 
        cutoutPercentage: 80,
        legend: { display: false },
        animate: true,
        tooltips: false
    }
});


/* pie chart */
var ctx = document.getElementById('pie').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    borderWidth: 0,
    data: {
        labels: [" Paid ", " Unpaid "],
        datasets: [{
            backgroundColor: ['#C11083', '#78C904'],
            data: [45, 55],
            borderWidth: 0,
        }]
    },
    options: { 
        legend: { display: false },
        tooltips: false
    }
});


/* line chart */
var ctx = document.getElementById('line').getContext('2d');
var chart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan","Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
        xAxisID:'Hours Usage',
        yAxisID:'Hours',
        datasets: [
            {
                pointHoverRadius:'7',
                pointHoverBackgroundColor:'rgb(193, 16, 131)',
                pointBackgroundColor:'#ffffff',
                pointBorderColor:'rgb(193, 16, 131)',
                pointRadius:'5',
                pointBorderWidth:'2',
                backgroundColor:'rgba(193, 16, 131,0)',
                borderColor:'rgb(193, 16, 131)',
                borderWidth:'2',
                data: [200, 300, 50, 450, 120, 80, 170, 230, 110],
                lineTension: 0
            },
            {
                pointHoverRadius:'7',
                pointHoverBackgroundColor:'rgb(120, 201, 4)',
                pointBackgroundColor:'#ffffff',
                pointBorderColor:'rgb(120, 201, 4)',
                pointRadius:'5',
                pointBorderWidth:'2',
                backgroundColor:'rgba(120, 201, 4, 0)',
                borderColor:'rgb(120, 201, 4)',
                borderWidth:'2',
                data: [0, 100, 150, 80, 240, 180, 290, 140, 380],
                lineTension: 0
            }
        ]
    },

    options: {
        legend: {
            display: false
        },
        scales: {
            xAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'MONTHS'
                },
                gridLines: {
                    display:false,
                    drawBorder: false
                }   
            }],
            yAxes: [{
                scaleLabel: {
                    display: true,
                    labelString: 'USRES'
                },
                gridLines: {
                    color: '#f9f9f9'
                }
            }]
        },
        tooltips: {
            mode: 'point',
            intersect: true,
            cornerRadius: 0,
            bodySpacing: 10,
            xPadding: 15,
            yPadding: 10
        }
    }
});
</script>
</body>
</html>