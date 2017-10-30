<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>National Loss and Damage Registry</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet"> 

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation" style="margin: 0px 0px 0px 0px;">
            <div class="navbar-header">
                     <a class="navbar-brand" href="https://www.gov.ph/">
                        <img src="../img/RNP.png" style="width:30px;height:30px; margin: 0px 0px 0px 0px;"> 
                     </a>        
                    <a class="navbar-brand active" href="home">        <font color="white">Home    </font></a>
                    <div class="dropdown navbar-brand">
                        <a class="dropdown-toggle" data-toggle="dropdown">  <font color="white">Reports  </font> </a>
                          <ul class="dropdown-menu">
                            <li><a href="reports">Yearly Reports</a></li>
                            <li><a href="reportsVisual">Visual Reports</a></li>
                          </ul>
                    </div>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: white;">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Public User </a>
                        </li>
                        <li class="disabled"><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login"><i class="fa fa-sign-out fa-fw"></i> Login </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        </nav>

            <!-- Banner row -->
            <div class="row">
                <div class="col-lg-12" align="middle" style="background-color: rgba(100,149,237,0.6);" >               
                 <h2>
                     <img src="../img/OCDLogo.png" style="width:100px;height:100px;"> 
                    <font color="white"> National Loss and Damage Registry </font>
                 </h2>
                    <!--<font style="font-size: 20px; color: white;">  National Disaster Risk Reduction and Management Council </font>  -->                 
                 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Damage per Region
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Drill Down
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="/home">Damage per Region</a>
                                        </li>
                                        <li><a href="/homeDrillDown">Disaster Event per Region</a>
                                        </li>
                                        <li><a href="/homeDrillDown1">Aid Provided per Municipality</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <iframe width="1400" height="600" src="https://app.powerbi.com/view?r=eyJrIjoiMGRlM2U5MWUtYjNmZS00YzQ5LWEyNWYtMDM1NWJlZmQ3ZDAyIiwidCI6ImYzNGEzNWJkLWE2NWQtNDYwNS1iMGZhLWQyNTcxZjgzMWY1ZSIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
</html>
