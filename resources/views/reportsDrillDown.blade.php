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

    <!-- Morris Charts CSS -->
    <link href="../vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]
 -->
    <style type="text/css" media="screen">
        body,
        html {
            width: 100%;
            overflow: hidden;
        }

        * {
            padding: 0;
            margin: 0;
        }
    </style>
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
            <div class="col-lg-12" style="background-color: rgba(100,149,237,0.6);" >               
             <h2 align="left">                   
                <font> Generate Report </font>
             </h2>         
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- Panel Heading -->
                        <div class="panel-heading">    
                            <!-- Report Header -->
                            <br>
                            <div class="row" align="center">
                                    Department of National Defense               <br>                                       
                                <b> OFFICE OF CIVIL DEFENSE </b>                 <br>   
                                    Camp Emilio Aguinaldo, Quezon City           <br>
                               <b>
                                @foreach ($yearlyData as $data)
                                    {{ $data->RGDESC }}
                                @endforeach
                                 AND THEIR  EFFECTS
                                </b>                                             <br> 
                                <select>
                                    @foreach ($date as $d)
                                        <option>{{ date('Y', strtotime( $d->STARTDATE))}}</option>
                                     @endforeach
                                </select>                                          
                            </div>
                            <br>
                             <!-- /.Report Header -->
                         </div>
                         <!-- /.Panel Heading -->
                         <!-- Panel Body -->
                         <div class="panel-body">
                             <div class="row col-lg-12">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead bgcolor="#00FF00">                                    
                                        <!--<div class="col-lg-12">
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"><b>DAMAGES</b></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"><b>AFFECTED</b></p>
                                            <p class="col-lg-1"><b></b></p>
                                            <p class="col-lg-1"><b>CASUALTIES</b>   </p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"><b>HOUSES</b></p>
                                            <p class="col-lg-1"><b>PROPERTIES(M)</b></p>
                                            <p class="col-lg-1"></p>
                                            <p class="col-lg-1"><b></b></p>
                                            <p class="col-lg-1"><b></b></p>
                                        </div>  -->                                     
                                        <tr>
                                            <th>NAME</th>
                                            <th>DATE</th>
                                            <th>REG</th>
                                            <th>PROV</th>                                            
                                            <th>FAM</th>
                                            <th>PERS</th>
                                            <th>DEAD</th>
                                            <th>INJ</th>
                                            <th>MIS</th>
                                            <th>TOT</th>
                                            <th>PART</th>
                                            <th>AGRI(MM)</th>
                                            <th>INFRA(MM)</th>
                                            <th>Total Cost of Damages(MM)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($yearlyData as $allData)                                                                           
                                        <tr>
                                            <td>{{ $allData->INCIDENTNAME}}</td>
                                            <td>{{ $allData->STARTDATE}}</td>
                                            <td>{{ $allData->REGIONCODE}}</td>
                                            <td>{{ $allData->DESCRIPTION}}</td>
                                            <td>{{ $allData->AFFECTEDFAM}}</td>
                                            <td>{{ $allData->AFFECTEDPER}}</td>
                                            <td>{{ $allData->DEAD}}</td>
                                            <td>{{ $allData->INJURED}}</td>
                                            <td>{{ $allData->MISSING}}</td>
                                            <td>{{ $allData->DMGHOUSES}}</td>
                                            <td>{{ $allData->DESHOUSES}}</td>
                                            <td>{{ $allData->LDMG}}</td>
                                            <td>{{ $allData->IDMG}}</td>
                                            <td>{{ $allData->totalDMG}}</td>
                                        </tr> 
                                    @endforeach        
                                    </tbody>
                                </table>
                            </div>
                            <!-- ./Panel Body -->
                            <!-- /.table-->
                        </div>
                    </div>
                    <!-- /.panel-->
                        <div class="row" align="center">
                            <!-- Print Button 
                             <button class="btn btn-primary" onclick="myFunction()" style="inline-block">
                                <span class="glyphicon glyphicon-print"></span> Print
                             </button> -->
                             <!-- ./Print Button -->

                            <!-- Export Button -->
                            <button class="btn btn-primary" style="inline-block">
                                    <img src ="http://icons.iconarchive.com/icons/ncrow/mega-pack-1/128/Excel-icon.png" width="10%"; height="10%"> Export to Excel
                            </button>
                            <!-- ./Export Button -->
                        </div>
                </div>
                <!-- /.col-lg-12-->
            </div>
            <!-- /.row -->
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

</body>
<script>
    Morris.Bar({
      element: 'employee-tardiness',
      data: [
        { y: 'Jose Rizal', a: 1 },
        { y: 'Saturnina Hidalgo', a: 7},
        { y: 'Paciano Mercado', a: 5 },
        { y: 'Olympia Hidalgo', a: 6 }
      ],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Employees']
    });
</script>
<script type="text/javascript">
    function myFunction() {
    window.print();
}
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable({
            "bFilter": false,
            "paging":   false,
            "info":     false            
        });

    } );
</script>
</html>
