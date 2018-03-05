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
use App\ReportModel;

class reportController extends BaseController
{
    // get input data and pass to other page
    public function passData(Request $req)
    {
        $date = ReportModel::getDistinctDate();
        $yearlyData = ReportModel::getReportDataFiltered($req);
       foreach ($yearlyData as $name) {
           $disasterName = $name->DISASTERNAME;
       }

        $assetDMG = ReportModel::getAssetDMG($disasterName);
        $assetLOSS = ReportModel::getAssetLOSS($disasterName);
        $agriLOSS = ReportModel::getAgriLOSS($disasterName);
        $prodLOSS = ReportModel::getProdLOSS($disasterName);

       /* for($i = 0; $i < count($assetLOSS); $i++)
        {
            $totalLOSS = $assetLOSS[$i] + $agriLOSS[$i] + $prodLOSS[$i];
        }*/
        //$totalLOSS = $assetLOSS + $agriLOSS + $prodLOSS;
        if(count($yearlyData)>0)
        {
            return view('reportsResults')->with('yearlyData',$yearlyData)->with('date', $date)->with('assetDMG',$assetDMG)->with('assetLOSS',$assetLOSS)->with('agriLOSS',$agriLOSS)->with('prodLOSS',$prodLOSS);
        }
        else
        {      
            $yearlyData = array();
            return view('reportsResults')->with('yearlyData',$yearlyData)->with('date', $date);
        }       
    
    public function getRegionDetails($req)
    {
        $temp = $req->input('locality');
        printf($temp);
    }
    
    public function getData()
    {
       $data = ReportModel::getDistinctDate();
       $disasterData = ReportModel::getAllDisaster();
        if(count($data)>0)
        {
            return view('reports')->with('data', $data) ->with('disasterData', $disasterData); 
        }

        else
        {
            return view('reports');
        }
    }

    //Report with Visuals
    public function passDataVisual(Request $req)
    {
       // $filteredData = ReportModel::getReportDataFilteredVisual($req);
        //print_r($filteredData);

        return view('reportsVisualDetails');
    }

    public function getDataVisual()
    {
        $disasterData = ReportModel::getAllDisaster();
        $regions = ReportModel::getAllRegion();
        $date = ReportModel::getDistinctDate();
        return view('reportsVisual')->with('disasterData',$disasterData)->with('regions', $regions);
    }

    public function passDataDrill(Request $req)
    {
        //$temp = $req->input('DISASTERNAME');
        $disasterLocality = ReportModel::getDisasterLocality($req);
        //print_r($disasterLocality);
        return view('reportsResultsDrill')->with('disasterLocality',$disasterLocality);
    }
}


