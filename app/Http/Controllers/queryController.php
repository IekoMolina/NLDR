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
       $disasterType = QueryModel::getAllDisasterType();
       $region = DB::table("region")->pluck("REGIONCODE","REGIONID");

       $sectors = DB::table("sector")->pluck("SECTOR","SECTORID");
        return  view('queryBuild', compact('sectors','region'))->with('disasterType',$disasterType);

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

    //Report with Visuals
    public function passDataVisual(Request $req)
    {
        $disasterType = $req->input('disasterType');
        $year = $req->input('year');
        $damages = $req->input('damages');
        $regions = $req->input('regions');

        return view('reportsVisualDetails')->with([
            'disasterType'=> $disasterType,
            'year'=> $year,
            'damages'=> $damages,
            'regions'=> $regions
            ]);
    }

    public function getDataVisual()
    {
       $data = ReportModel::getExistingDisaster();
       $disasterData = ReportModel::getAllDisaster();
       $regions = ReportModel::getAllRegion();
        
        if(count($data)>0)
        {
            return view('reportsVisual')->with('data', $data)->with('disasterData', $disasterData)->with('regions', $regions); 
        }

        else
        {
            return view('reportsVisual');
        }
    }

    public function getDataFilter(Request $req)
    {

    }

    public function passDataFilter(Request $req)
    {
        $selected = $req->input('filter');
        foreach ($selected as $f){ 
            echo $f."<br />";
        }
    }
}


