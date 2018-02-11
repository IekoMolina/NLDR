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


      return $startDate;
    }
}
