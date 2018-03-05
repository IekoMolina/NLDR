<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>National Loss and DIsaster Registry</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

    <!-- MetisMenu CSS -->  
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">  

    <!-- Animation library for notifications   -->
    <link href="../vendor/bootstrap/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../vendor/bootstrap/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../vendor/bootstrap/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <!-- The start of the Side bar code -->
    <div class="sidebar" data-color="darkblue" data-image="../img/storm.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    <img src="../img/OCDLogo.png" style="width:150px;height:150px; margin: 0px 0px 0px 0px;"> <b>NDRRMC  </b>  
                </a>
            </div>

            <ul class="nav">
                <li >
                    <a href="home">
                        <i class="fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li>
                    <a href="queryBuild">
                        <i class="fa fa-search"></i>
                        <p>Query Builder</p>
                    </a>
                </li>
                <li class = "active">
                    <a href="reports">
                        <i class="fa fa-table   "></i>
                        <p>Yearly Reports</p>
                    </a>
                </li>
                <li>
                    <a href="reportsVisual">
                        <i class="fa fa-bar-chart"></i>
                        <p>Visual Reports</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-folder"></i>
                        <p>Downloadable Reports</p>
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-map-marker"></i>
                        <p>Maps</p>
                    </a>
                </li>
			
            </ul>
    	</div>
    </div>
    <!-- The end of the Side bar code -->

    <div class="main-panel">
          <!-- start of header code -->
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
              
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">   </a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                            <li><h4><B>National Loss and Damage Registry</B>  </h4></li>             
                    </ul>
                    <ul class = "nav navbar-nav navbar-center"> 

                                 
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        
                      
                      
                        <li>
                            <a href="#">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>
  <!-- end of header code -->


        <div class="content">   
            <div class="container-fluid">
                    <!-- row 1 --> 
                    <div class = "row">  
                     <div class = "panel panel-primary"> 
                        <div class = "panel-body"> 
                                <div class ="row">  
                                    <div class = "col-md-12"> 
                                        <div class ="header"> 
                                            <br>
                                            <div class="row" align="center">
                                                    Department of National Defense               <br>                                       
                                                <b> OFFICE OF CIVIL DEFENSE </b>                 <br>   
                                                    Camp Emilio Aguinaldo, Quezon City           <br>
                                                    @foreach ($date as $d)
                                                        <option>{{ date('Y', strtotime( $d->STARTDATE))}}</option>
                                                    @endforeach
                                            <b>                                         
                                            </div>
                                            <br>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class = "row"> 
                                    <div class= "col-md-12"> 
                                        <div class = "content table-responsive table full-width"> 
                                                <table id="example" class="table table-bordered table-striped">
                                                        <thead bgcolor="#0D4F8B">                                                                       
                                                            <tr>
                                                                <th>NAME</th>
                                                                <th>START</th>
                                                                <th>END</th>
                                                                <th>#Locality</th>                                  
                                                                <th>#Affected</th>
                                                                <th>#Evacuated</th>
                                                                <th>#DEAD</th>
                                                                <th>#INJ</th>
                                                                <th>#MIS</th>
                                                                <th>Asset DMG</th>
                                                                <th>Asset Loss</th>
                                                                <th>Agri Loss</th>
                                                                <th>Prod Loss</th>
                                                                <th>Total Loss</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($yearlyData as $allData)                                                                           
                                                            <tr>
                                                                <td>{{ $allData->DISASTERNAME}}</td>
                                                                <td>{{ $allData->STARTDATE}}</td>
                                                                <td>{{ $allData->ENDDATE}}</td>
                                                                <form action="/reportsResultDrill" method="post">
                                                                <td><a type="submit" name="locality" value="PEPE">{{ $allData->CLOC}}</a></td>
                                                                </form>
                                                                <td>{{ $allData->SDAP}}</td>
                                                                <td>{{ $allData->SEP}}</td>
                                                                <td>{{ $allData->SDEAD}}</td>
                                                                <td>{{ $allData->SINJ}}</td>
                                                                <td>{{ $allData->SMISS}}</td>
                                                                <td>$allData->ADT</td>
                                                                <td> $allData->ALT</td>
                                                                <td> $allData->AGLT</td>
                                                                <td> $allData->PLT</td>
                                                                <td> $allData->totalLoss</td>
                                                            </tr> 
                                                        @endforeach        
                                                        </tbody>
                                                 </table>
                                        </div>
                                        <!-- insert here pls -- > 

    
                                    </div>
                                </div> 
                                <div class="row" align="center">
                                          <!-- Print Button -->
                                        <button class="btn btn-primary" onclick="myFunction()" style="inline-block">
                                            <span class="glyphicon glyphicon-print"></span> Print
                                        </button> 
                                        <!-- ./Print Button -->

                                        <!-- Export Button   <img src ="http://icons.iconarchive.com/icons/ncrow/mega-pack-1/128/Excel-icon.png" width="10%"; height="10%">-->
                                        <button id="create_excel" class="btn btn-primary" style="inline-block">
                                            Export to Excel
                                        </button>
                                        <!-- ./Export Button -->
                                        <!-- Print Button -->
                                        <button class="btn btn-primary" onclick="myFunction()" style="inline-block">
                                            Export to CSV
                                        </button> 
                                        <!-- ./Print Button -->
                                </div>
                            </div>

                        </div>
                    </div>
                

                    </div>
                    <!-- end of row 1-->
                    <div class = "row"> 
                        
                            
                    </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                <img src="../img/Logo.png" style="width:100px;height:50px; margin: 0px 0px 0px 0px;">
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="../vendor/bootstrap/js/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../vendor/bootstrap/js/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../vendor/bootstrap/js/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="../vendor/bootstrap/js/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../vendor/bootstrap/js/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="../vendor/bootstrap/js/js/demo.js"></script>


    <script type="text/javascript">
    function myFunction() {
    window.print();
    }
    </script>

     <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable({
                    "bFilter": false,
                    //  "paging":   false,
                    "info":     false
                });

            } );
    </script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#create_excel').click(funtion(){
                    var excel_data = $('#example').html();
                    var page = "excel.php?data=" + excel_data;
                    window.location=page;
                });

            } );    
    </script>

</html>
