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
use App\GlideEvent;

class reportController extends BaseController
{
    // get input data and pass to other page
    public function passData(Request $req)
    {
        $disasterType = $req->input('disasterType');
        $year = $req->input('year');

        return view('reportsDrillDown')->with([
            'disasterType'=> $disasterType,
            'year'=> $year
            ]);
    }

    public function getData()
    {
        $data = ReportModel::all();
        $dateData = DB::table('GlideEvent')->pluck('STARTDATE');
        
        if(count($data)>0)
        {
            return view('reports')->with('data', $data)->with('dateData', $dateData); 
        }

        else
        {
            return view('reports');
        }
    }

}


