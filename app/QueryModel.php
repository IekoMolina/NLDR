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
      print_r($startDate);
      print_r($sector);
      print_r($endDate);
      print_r($region);
      print_r($disasterType);

      $queryDataFiltered = DB::table('DISASTER')
      ->join('DISASTERTYPE', 'DISASTER.DISTYPEID','=','DISASTERTYPE.DISTYPEID')
      //->join('AGRI_LOSS', 'DISASTER.DISASTERID','=','AGRI_LOSS.DISASTERID')
      //->join('CATEGORY', 'AGRI_LOSS.CATEGORYID','=','CATEGORY.CATEGORYID')
      //->join('SUBSECTOR', 'CATEGORY.SUBSECTORID','=','SUBSECTOR.SUBSECTORID'), 'SECTOR.*','SUBSECTOR.*'
      //->join('SECTOR', 'SUBSECTOR.SECTORID','=','SECTOR.SECTORID')
      ->join('LOCALITY', 'LOCALITY.LOCALITYID','=','DISASTER.LOCALITYID')
      ->join('PROVINCE','PROVINCE.PROVID','=','LOCALITY.PROVID')
      ->join('REGION','REGION.REGIONID','=','PROVINCE.REGIONID')
      ->select('DISASTER.*', 'DISASTERTYPE.DISASTERTYPE','REGION.REGIONCODE')
      ->where([
            ['DISASTERTYPE.DISASTERTYPE', '=', $disasterType],
            ['DISASTER.STARTDATE', '>=', $startDate],
            ['DISASTER.ENDDATE', '<=', $endDate],
            //['SECTOR.SECTORID', '=', $sector],
            ['REGION.REGIONCODE', '=', $region]
        ])
        ->get();  

        return $queryDataFiltered;
    }
}
