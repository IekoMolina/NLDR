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
                    <a class="navbar-brand" href="home">        <font color="white">Home    </font></a>
                    <a class="navbar-brand" href="reports">     <font color="white">Report  </font></a>
                    <a class="navbar-brand" href="encoding">  <font color="white">Encode  </font></a>
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
                    <font> Search Disasters </font>
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
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    Filter Data
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-24" align="text-center">
                                                            <form role="form" action="/filterdata" method="post">
                                                                <div class="col-lg-4 col-md-offset-2">
                                                                    <div class="form-group">
                                                                        <label>Start Date</label>
                                                                        <input class="form-control" type="date" name="startDate">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>End Date</label>
                                                                        <input class="form-control" type="date" name="endDate">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Disaster Type</label>
                                                                        <select class="form-control" name="disasterType">
                                                                             <option>Deaths</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Select Events With</label>
                                                                            <select multiple class="form-control" name="eventsFilter">
                                                                                <option>Deaths</option>
                                                                                <option>Injured Casualties</option>
                                                                                <option>Missing Casualties</option>
                                                                                <option>Partially Damaged Houses</option>
                                                                                <option>Totally Damaged Houses</option>
                                                                                <option>Affected Families</option>
                                                                                <option>Affected Persons</option>
                                                                                <option>Evacuated Families</option>
                                                                                <option>Evacuated Persons</option>
                                                                                <option>Occupied Evacuation Centers</option>
                                                                                
                                                                            </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Select Sectors that Events Affected With</label>
                                                                            <select multiple class="form-control" name="eventsFilter">
                                                                                <option>Infrastructure</option>
                                                                                <option>Agriculture</option>
                                                                                <option>Private / Commercial</option>
                                                                                <!-- disaster sectors event filter-->
                                                                            </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="form-group">
                                                                        <label>Region/s Affected by the Disaster</label>
                                                                            <select multiple class="form-control" name="regionsAffected">
                                                                                <option> </option> 
                                                                                </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Provinces Affected by the Disaster</label>
                                                                            <select multiple class="form-control" name="provincesAffected">
                                                                                <option>Cavite</option>
                                                                                <option>Laguna</option>
                                                                                <option>Batangas</option>
                                                                                <option>Rizal</option>
                                                                                <option>Quezon Province</option>
                                                                                <!-- region 4 provinces-->
                                                                            </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label>Cities/Municipalities Affected by the Disaster</label>
                                                                            <select multiple class="form-control" name="citiesAffected">
                                                                                <option>Silang</option>
                                                                                <option>Kawit</option>
                                                                                <option>Maragondon</option>
                                                                                <!-- region 4 cavite municipalities-->
                                                                            </select>
                                                                    </div>
                                                                </div>
                                                                <div align="text-center" class="form-group col-lg-12" >
                                                                    <button type="submit" name="submit" class="btn btn-default">View Data</button>
                                                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Customize</button>
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
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Select Filters</h4>
                  </div>
                  <div class="modal-body">
                    <form>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div> 
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                          </div>     
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                  </div>
                </div>

              </div>
            </div>
            <!-- /Modal -->
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
