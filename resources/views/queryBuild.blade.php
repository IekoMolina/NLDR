<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
                                                            <form role="form" action="/queryResult" method="post">
                                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                <div class="col-lg-4 col-md-offset-2">
                                                                @foreach ($default as $def)
                                                                    @if($def == 'STARTDATE')                                                        
                                                                     <div class="form-group">
                                                                        <label>Start Date</label>
                                                                        <input class="form-control" type="date" name="startDate">
                                                                    </div>

                                                                    @elseif($def == 'ENDDATE') 
                                                                    <div class="form-group">
                                                                        <label>End Date</label>
                                                                        <input class="form-control" type="date" name="endDate">
                                                                    </div>

                                                                    @elseif($def == 'SECTOR') 
                                                                    <div class="form-group">
                                                                        <label>Sector</label>
                                                                            <select multiple name="sector" class="form-control">
                                                                               @foreach($sectors as $key => $value)
                                                                                <option value="{{ $key }}">{{ $value }}</option>
                                                                                @endforeach 
                                                                            </select>
                                                                    </div>

                                                                    @elseif($def == 'SUBSECTOR') 
                                                                     <div class="form-group">
                                                                        <label>Subsector</label>
                                                                            <select multiple name="subsector" class="form-control">
                                                                            </select>
                                                                    </div>

                                                                    @elseif($def == 'DISASTERTYPE') 
                                                                    <div class="form-group">
                                                                        <label>Disaster Type</label>
                                                                            <select multiple class="form-control" name="disasterType">
                                                                                @foreach($disasterType as $valueD)
                                                                                <option value="{{ $valueD->DISTYPEID }}">{{ $valueD->DISASTERTYPE }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                    </div>
                                                                    <!--<div class="form-group">
                                                                        <label>Select Events With</label>
                                                                            <select multiple class="form-control" name="events">
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
                                                                    </div>-->
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    @elseif($def == 'REGION') 
                                                                    <div class="form-group">
                                                                        <label>Region/s Affected by the Disaster</label>
                                                                            <select multiple class="form-control" name="region">
                                                                               @foreach($region as $key => $valueR)
                                                                                <option value="{{ $key }}">{{ $valueR }}</option>
                                                                                @endforeach 
                                                                            </select>
                                                                    </div>

                                                                    @elseif($def == 'PROVINCE')
                                                                    <div class="form-group">
                                                                        <label>Provinces Affected by the Disaster</label>
                                                                            <select multiple class="form-control" name="province">
                                                                               @foreach($province as $key => $valueP)
                                                                                <option value="{{ $key }}">{{ $valueP }}</option>
                                                                                @endforeach                                                            
                                                                            </select>
                                                                    </div>

                                                                    @elseif($def == 'LOCALITY')
                                                                    <div class="form-group">
                                                                        <label>Locality Affected by the Disaster</label>
                                                                            <select multiple class="form-control" name="city">
                                                                               @foreach($locality as $key => $valueL)
                                                                                <option value="{{ $key }}">{{ $valueL }}</option>
                                                                                @endforeach                                                                                                    
                                                                            </select>
                                                                    </div>

                                                                    @elseif($def == 'NEEDS')
                                                                    <div class="form-group">
                                                                        <label>NEEDS</label>
                                                                        <input type="checkbox" name="needs" value="TRUE">
                                                                    </div>
                                                                    
                                                                    @elseif($def == 'LOSS')
                                                                    <div class="form-group">
                                                                        <label>LOSSES</label>
                                                                            <select multiple class="form-control" name="loss">
                                                                                <option value="1">Asset Loss</option>
                                                                                <option value="2">Agriculture Loss</option>
                                                                                <option value="3">Product Loss</option>
                                                                                <option value="4">Macroecon Loss</option>                                                 
                                                                            </select>
                                                                    </div>
                                                                    @endif
                                                                @endforeach
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
                  <form action="/queryBuildFilter" method="post">
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <div class="modal-body">
                      <input type="checkbox" name="filter[]" value="STARTDATE" checked> Start Date<br>
                      <input type="checkbox" name="filter[]" value="ENDDATE"  checked> End Date<br>
                      <input type="checkbox" name="filter[]" value="SECTOR"  checked> Sector<br>
                      <input type="checkbox" name="filter[]" value="SUBSECTOR"> Subsector<br>
                      <input type="checkbox" name="filter[]" value="DISASTERTYPE"  checked> Disaster Type<br>
                      <input type="checkbox" name="filter[]" value="REGION" checked> Region<br>
                      <input type="checkbox" name="filter[]" value="PROVINCE">Province<br>
                      <input type="checkbox" name="filter[]" value="LOCALITY"> Locality<br>
                      <input type="checkbox" name="filter[]" value="LOSS"> Loss<br>
                      <input type="checkbox" name="filter[]" value="NEEDS"> Needs<br>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-default">Save</button>
                  </div>
                   </form>
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

    <!-- Ajax for Sector/Subsector -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="sector"]').on('change', function() {
            var sectorID = $(this).val();
            if(sectorID) {
                $.ajax({
                    url: '/queryBuild/ajax/'+sectorID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                        
                        $('select[name="subsector"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subsector"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="subsector"]').empty();
            }
        });
    });
    </script>

    <!-- Ajax for Region/Provinces -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="region"]').on('change', function() {
            var regionID = $(this).val();
            if(regionID) {
                $.ajax({
                    url: '/queryBuildR/ajax/'+regionID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                        
                        $('select[name="province"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="province"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="province"]').empty();
            }
        });
    });
    </script>

    <!-- Ajax for Provinces/Municipalities -->
    <script type="text/javascript">
    $(document).ready(function() {
        $('select[name="province"]').on('change', function() {
            var provID = $(this).val();
            if(provID) {
                $.ajax({
                    url: '/queryBuildC/ajax/'+provID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {                        
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
    });
    </script>
    
</body>
   <!--   Core JS Files   -->
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




</html>
