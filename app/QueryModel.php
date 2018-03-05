<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
class QueryModel extends Model
{
   	public static function getExistingDisaster()
   	{
       	$existingData = DB::table('DISASTER')
       					->select('DISASTER.*')
       					->get();
       	return $existingData;
   	}

    // Gets all disaster type from the database
   	public static function getAllDisasterType()
   	{
   		$disasterData = DB::table('DISASTERTYPE')
   						  ->select('DISASTERTYPE.*')
   						  ->get();
   		return $disasterData; 
   	}

    // Gets all region from the database
   	public static function getAllRegion()
   	{
   		$region = DB::table('REGION')
   					->select('REGION.*')
   					->get();
   		return $region;
   	}

  // Gets all sector from the database
    public static function getAllSector()
    {
      $sector = DB::table('SECTOR')
      ->select('SECTOR.*')
      ->get();
      return $sector;
    }

    //Get all subsector from database with id
    public static function getAllSubsector($id)
    {
      $subsectors = DB::table("SUBSECTOR")
            ->where("SECTORID",$id)
            ->lists("SUBSECTOR","SUBSECTORID");
      return $subsectors;
    }

    //Get all data that are result of the query
    public static function getQueryDataFiltered($req)
    {

      $startDate = $req->input('startDate');
      $endDate = $req->input('endDate');
      $event = $req->input('events');
      $sector = $req->input('sector');
      $subsector = $req->input('subsector');
      $disasterType = $req->input('disasterType');
      $region = $req->input('region');
      $province = $req->input('province');
      $city = $req->input('city');

      $queryDataFiltered = DB::table('DISASTER')
        ->join('LOCALITY', 'LOCALITY.LOCALITYID','=','DISASTER.LOCALITYID')
        ->join('PROVINCE','PROVINCE.PROVID','=','LOCALITY.PROVID')
        ->join('REGION','REGION.REGIONID','=','PROVINCE.REGIONID')
        ->join('ASSETS_LOSS','ASSETS_LOSS.LOSSID','=','DISASTER.LOSSID')
        ->join('PROD_LOSS','PROD_LOSS.PRODLOSSID','=','DISASTER.PRODLOSSID') 
        ->join('AGRI_LOSS','AGRI_LOSS.AGRILOSSID','=','DISASTER.AGRILOSSID')
        ->join('MACROECON_LOSS','MACROECON_LOSS.MACROECONLOSSID','=','DISASTER.MACROECONLOSSID')
        ->join('CATEGORY','CATEGORY.CATEGORYID','=','MACROECON_LOSS.ASSETCATEGORYID')
        ->join('SUBSECTOR','SUBSECTOR.SUBSECTORID','=','CATEGORY.SUBSECTORID')
        ->join('SECTOR','SECTOR.SECTORID','=','SUBSECTOR.SECTORID')
        ->join('NEEDS','NEEDS.SUBSECTORID','=','SUBSECTOR.SUBSECTORID')
        ->join('AGENCY','AGENCY.AGENCYID','=','NEEDS.AGENCYID')
        ->join('TASK','TASK.TASKID','=','NEEDS.TASKID')
        ->select('REGION.*')
        ->get();  

        return $queryDataFiltered;
    }
}
