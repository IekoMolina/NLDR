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
                     <a class="navbar-brand" href="home">
                        <img src="../img/RNP.png" style="width:30px;height:30px; margin: 0px 0px 0px 0px;"> 
                     </a>        
                    <a class="navbar-brand active" href="homeOCD">        <font color="white">Home    </font></a>
                    <a class="navbar-brand" href="reports">     <font color="white">Report  </font></a>
                      <a class="navbar-brand" href="queryBuild">     <font color="white">Query  </font></a>
                    <div class="dropdown navbar-brand">
                        <a class="dropdown-toggle" data-toggle="dropdown">  <font color="white">Encode  </font> </a>
                          <ul class="dropdown-menu">
                            <li><a href="encodingNewDisaster">New Disaster</a></li>
                            <li><a href="updateDisasterInfo">Update Disaster</a></li>                           
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
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Administrator</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Roles</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login"><i class="fa fa-sign-out fa-fw"></i> Login</a>
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
                <div class="col-lg-12" style="background-color: rgba(100,149,237,0.6);" >               
                 <h2 align="left">                   
                    <font> Encode Disaster Information </font>
                 </h2>
                    <!--<font style="font-size: 20px; color: white;">  National Disaster Risk Reduction and Management Council </font>  -->
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>                 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <!-- Panel Body -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <!--
                                    <form action="/generateReport" method="post">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group col-lg-6">
                                            <label>Disaster Type</label>
                                            <select class="form-control" name="disasterType">
                                                <option>TYPHOON</option>
                                                <option>EARTHQUAKE</option>
                                                <option>FLASH FLOOD</option>
                                                <option>FIRE</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-lg-6">
                                            <label>Year</label>
                                            <select class="form-control" name="year">
                                                <option>2013</option>
                                                <option>2014</option>
                                                <option>2015</option>
                                                <option>2016</option>
                                            </select>
                                        </div>

                                        <div align="text-center" class="form-group col-lg-3" >
                                            <input type="submit" name="submit" value="submit">
                                        </div>
                                    </form>
                                    -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Input New Disaster Details
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <form role="form">
                                                                <div class="form-group" action="/encodingNewDisasterDetails" method="post">
                                                                    <label>Select Barangay</label>
                                                                    <select class="form-control" name="barangay">
                                                                        <option>Mariana</option>
                                                                        <option>Holy Spirit</option>
                                                                        <option>Laging Handa</option>
                                                                        <option>Masantol</option>
                                                                        <option>Magkaisa</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="form-group col-lg-12">
                                                                        <label>Casualties</label>
                                                                    </div>
                                                                    <div class="form-group col-lg-4">
                                                                        <p>Dead<input class="form-control" type="number" name="dead">
                                                                    </div>
                                                                    <div class="form-group col-lg-4">
                                                                        <p>Injured<input class="form-control" type="number" name="injured">
                                                                    </div>
                                                                    <div class="form-group col-lg-4">
                                                                        <p>Missing<input class="form-control" type="number" name="missing">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <div class="form-group col-lg-12">
                                                                        <label>Affected</label>
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <p>Families<input class="form-control" type="number" name="affectedFamilies">
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <p>Persons<input class="form-control" type="number" name="affectedPersons">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-group col-lg-12">
                                                                        <label>Evacuated</label>
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <p>Families<input class="form-control" type="number" name="evacuatedFamilies">
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <p>Persons<input class="form-control" type="number" name="evacuatedPersons">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-group col-lg-12">
                                                                        <label>Evacuation Centers</label>
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <p>Occupied<input class="form-control" type="number" name="numEvacCenters">
                                                                    </div>
                                                                <div class="form-group">
                                                                    <div class="form-group col-lg-12">
                                                                        <label>Houses</label>
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <p>Partially Damaged<input class="form-control" type="number" name="partialDHouses">
                                                                    </div>
                                                                    <div class="form-group col-lg-6">
                                                                        <p>Totally Damaged<input class="form-control" type="number" name="totallyDHouses">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-group col-lg-12">
                                                                        <label>Damages to Properties</label>
                                                                    </div>
                                                                    <div class="form-group col-lg-4">
                                                                        <p>Total Cost<input class="form-control" type="number" name="costofDamages">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="form-group col-lg-12">
                                                                        <label>Aid</label>
                                                                    </div>
                                                                    <div class="form-group col-lg-4">
                                                                        <p>Aid Requested<input class="form-control" type="number" name="aidRequest">
                                                                    </div>
                                                                </div>

                                                                <div align="text-center" class="form-group col-lg-12" >
                                                                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                                                    <button type="reset" name="reset" class="btn btn-default">Reset</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
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
