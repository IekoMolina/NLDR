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

        if(count($yearlyData)>0)
        {
            return view('reportsResults')->with('yearlyData',$yearlyData)->with('date', $date);
        }
        else
        {      
            $yearlyData = array();
            return view('reportsResults')->with('yearlyData',$yearlyData)->with('date', $date);
        }       
      /* return view('reportsDrillDown')->with([
            'disasterType'=> $disasterType,
            'year'=> $year
            ]); 
    */
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
        $disasterData = ReportModel::getAllDisaster();
        $regions = ReportModel::getAllRegion();
        $date = ReportModel::getDistinctDate();
        return view('reportsVisual')->with('disasterData',$disasterData)->with('regions', $regions);
    }
}


