<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
//use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\QueryModel;
use DB;


class queryController extends BaseController
{
    private $def  = ['STARTDATE','ENDDATE','SECTOR','SUBSECTORID','DISASTERTYPE','REGION'];

    // get input data and pass to other page
    public function passData(Request $req)
    {
        $queryData = QueryModel::getQueryDataFiltered($req);

       if(count($queryData) > 0)
       {
        echo $queryData;
       }
       else
       {
        echo "Nope wala kasing laman";
       }
        
    }

    public function getData()
    {
       // static $count = 0;
        //$count++;
       // echo "this function has been called ". $count. " times";
     // Create Default Fields WHAT IF YUNG DEFAULT VARUABLES YUNG NASA LABAS
        $default = $this->def;
        print_r($default);
        foreach ($default as $defs)
        {
          echo $defs;
        }
       
       $disasterType = QueryModel::getAllDisasterType();
       $region = DB::table("region")->pluck("REGIONCODE","REGIONID");
       $province = DB::table("province")->pluck("PROVINCE","PROVID");
       $locality = DB::table("locality")->pluck("LOCALITYNAME","LOCALITYID");
       $sectors = DB::table("sector")->pluck("SECTOR","SECTORID");

        return  view('queryBuild', compact('sectors','region','province','locality'))->with('disasterType',$disasterType)->with('default',$default);

       // Put code that gets all tables here and pass to modal
       /*$tables = DB::select('SHOW TABLES');
        foreach($tables as $table)
        {
              echo $table->Tables_in_disdb;
              echo "<br>";
        }
       if(count($disasterType)>0)
        {
            return view('queryBuild')->with('disasterType', $disasterType) 
                                     ->with('regions', $region); 
        }
        else
        {
            return view('queryBuild');
        }*/
    }

    public function setFields()
    {

    }
    //Get sector
    /*public function getSector()
    {
        //$sectors = QueryModel::getAllSector();
        $sectors = DB::table("sector")->pluck("SECTOR","SECTORID");
        return  view('queryBuild', compact('sectors'));
    }*/
    //Get Subsector from id
    public function getSubsectorAjax($id)
    {
        //$subsector = QueryModel::getAllSubsector($id);
                $subsector = DB::table("subsector")
                    ->where("SECTORID",$id)
                    ->pluck("SUBSECTOR","SUBSECTORID");
        return json_encode($subsector);
    }

    //Get Province from id
    public function getProvinceAjax($id)
    {
        //$subsector = QueryModel::getAllSubsector($id);
                $province = DB::table("province")
                    ->where("REGIONID",$id)
                    ->pluck("PROVINCE","PROVID");
        return json_encode($province);
    } 

    //Get City from id
    public function getCityAjax($id)
    {
        //$subsector = QueryModel::getAllSubsector($id);
                $city = DB::table("locality")
                    ->where("PROVID",$id)
                    ->pluck("LOCALITYNAME","LOCALITYID");
        return json_encode($city);
    }       

    public function getDataFilter()
    {

        
    }

    public function passDataFilter(Request $req)
    {

     $selected = $req->input('filter');
     $this->def = $selected;
     print_r($this->def);

    //return redirect('queryBuild');
    }
}


