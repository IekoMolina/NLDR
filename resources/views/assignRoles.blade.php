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
    <style>
    .switch {
      position: relative;
      display: inline-block;
      width: 60px;
      height: 34px;
    }

    .switch input {display:none;}

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 26px;
      width: 26px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }

    .slider.round:before {
      border-radius: 50%;
    }
    </style>

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
                    <font>User Privileges</font>
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
                                                    Selecting User Privileges
                                                </div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <ul class="nav nav-pills">
                                                                <li class="active"><a href="#admin-pills" data-toggle="tab">Administrator</a>
                                                                </li>
                                                                <li><a href="#staff-pills" data-toggle="tab">Staff</a>
                                                                </li>
                                                                <li><a href="#public-pills" data-toggle="tab">Public</a>
                                                                </li>
                                                            </ul>

                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div class="tab-pane fade in active" id="admin-pills">
                                                                    <h4>Administrator Account</h4>
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Action</th>
                                                                                    <th>Current Setting</th>
                                                                                    <th>New Setting</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>View Public Map</td>
                                                                                    <td>Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox" checked>
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Encode New Disaster</td>
                                                                                    <td>Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox" checked>
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Update Registered Disaster</td>
                                                                                    <td>Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox" checked>
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Generate Reports</td>
                                                                                    <td>Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox" checked>
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- /.table-responsive -->
                                                                </div>
                                                                <div class="tab-pane fade" id="staff-pills">
                                                                    <h4>Staff Account</h4>
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Action</th>
                                                                                    <th>Current Setting</th>
                                                                                    <th>New Setting</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>View Public Map</td>
                                                                                    <td>Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox" checked>
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Encode New Disaster</td>
                                                                                    <td>Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox" checked>
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Update Registered Disaster</td>
                                                                                    <td>Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox" checked>
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Generate Reports</td>
                                                                                    <td>Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox" checked>
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- /.table-responsive -->
                                                                </div>
                                                                <div class="tab-pane fade" id="public-pills">
                                                                    <h4>Public Account</h4>
                                                                    <div class="table-responsive">
                                                                        <table class="table">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Action</th>
                                                                                    <th>Current Setting</th>
                                                                                    <th>New Setting</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>View Public Map</td>
                                                                                    <td>Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox" checked>
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Encode New Disaster</td>
                                                                                    <td>Not Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox">
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Update Registered Disaster</td>
                                                                                    <td>Not Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox">
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Generate Reports</td>
                                                                                    <td>Not Allowed</td>
                                                                                    <td>
                                                                                        <label class="switch">
                                                                                          <input type="checkbox">
                                                                                          <span class="slider round"></span>
                                                                                        </label>
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- /.table-responsive -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div align="text-right" class="form-group col-lg-12" >
                                                <button type="submit" name="submit" class="btn btn-default">Save</button>
                                                <button type="reset" name="reset" class="btn btn-default">Reset</button>
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
