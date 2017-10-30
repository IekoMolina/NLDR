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

class reportsVisualController extends BaseController
{
    // get input data and pass to other page
    public function passData(Request $req)
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

    public function getData()
    {
        $data = ReportModel::all();
        $dateData = DB::table('GlideEvent')->pluck('STARTDATE');
        $regions = DB::table('ref_region')->pluck('REGIONCODE');
        if(count($data)>0)
        {
            return view('reportsVisual')->with('data', $data)->with('dateData', $dateData)->with('regions', $regions); 
        }

        else
        {
            return view('reportsVisual');
        }
    }

}


