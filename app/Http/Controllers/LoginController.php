<?php 
namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Collection;
use App\LoginModel; 
class LoginController extends BaseController
{
     public function passUserDetails(Request $req)
     {
        $username= $req->input('username'); 
       $password=  $req->input('password');
      
   
         //$userdetails= LoginModel::GetUserData(); 
     
         // This calls the query function 
          // to get all username and password from the database 
          
          $checkLogin = DB::table('users')
          ->Select('users.*')
          ->where(['username'=>$username,'password'=>$password])
          ->get();
     
        
          if(count($checkLogin)>0)
          {
            return view ('homeOCD'); 
          }
          else
          {
          
             return view('login')->with([
            'username'=> $username,
            'password'=> $password, 
            ]);
          }
        
        
        
     }
     public function UserTrial (Request $req)
     {
            $username= $req->input('username'); 
            $password=  $req->input('password');
 
         return view('login')->with([
             'username'=> $username,
             'password'=> $password,
            
             ]);
     }
     /*
      public function passDataVisual(Request $req)
      {
          $disasterType = $req->input('disasterType');
          $year = $req->input('year');
          $damages = $req->input('damages');
          $regions = $req->input('regions');
              //fix this model should be used
        $yearlyData = ReportModel::getYearlyReportData(); /*->where([
            ['REF_GLIDEEVENTTYPE.GLIDEEVENTDESCRIPTION', '=', $disasterType],
            ['GLIDEEVENT.STARTDATE', '=', $year],
        ]);
          return view('reportsVisualDetails')->with([
              'disasterType'=> $disasterType,
              'year'=> $year,
              'damages'=> $damages,
              'regions'=> $regions
              ]);
      }
      */
  
}


