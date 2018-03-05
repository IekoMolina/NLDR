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
    <div class="sidebar" data-color="admin" data-image="../img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    <img src="../img/OCDLogo.png" style="width:150px;height:150px; margin: 0px 0px 10px 0px;"> <b>NDRRMC  </b>  
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="/homeAdministrator">
                        <i class="fa fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>
                <li >
                    <a href="/users">
                        <i class="fa fa-user-plus"></i>
                        <p>Create User</p>
                    </a>
                </li>
    
                <li>
                    <a href="">
                        <i class="fa fa-database"></i>
                        <p>Database</p>
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

                     


                    </div>
                    <!-- end of row 1-->
                    <div class = "row"> 
                        <div class = "panel panel-primary"> 
                            <div class = "panel-body"> 
                                <div class = "row">
                                  <div class= "col-md-12"> 
                                        <div class = "header"> 
                                                <h5> <b>User History    </b></h5>
                                            </div>
                                            <div class="content table-responsive table-full-width"> 
                                                <table class="table table-hover table-striped">
                                                    <thead> 
                                                        <th>FirstName</th>
                                                        <th>LastName</th>
                                                        <th>UserName</th>
                                                        <th>Job Position</th>
                                                        <th>Email</th>
                                                        <th>Table Edited</th>
                                                        <th>Date and Time Modified</th>
                                                        <th>Validation Status</th>
                                                    </thead>
                                                        
                                                </table>
                                                
                                            </div>
                                        </div>

                                  </div>

                            </div>

                        </div>
                            
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
    	$(document).ready(function(){

        	demo.initChartist();

        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>the National Lost and Damage Registry</b> - A Disaster Management Information System."

            },{
                type: 'info',
                timer: 4000
            });

    	});
	</script>

</html>
