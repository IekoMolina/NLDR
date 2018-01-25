<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
class ReportModel extends Model
{
   	public static function getExistingDisaster()
   	{
       	$existingData = DB::table('GLIDEEVENT')
       					->select('GLIDEEVENT.*')
       					->get();
       	return $existingData;
    }
	   public static function GetUserData() 
	   {
			   $existingData = DB::table('users')
			   ->select('users.username', 'users.password')
			   ->get();
		   return $existingData;
	   }
	  

   	public static function getAllDisaster()
   	{
   		$disasterData = DB::table('REF_GLIDEEVENTTYPE')
   						  ->select('REF_GLIDEEVENTTYPE.DESCRIPTION')
   						  ->get();
   		return $disasterData; 
   	}

   	public static function getAllRegion()
   	{
   		$region = DB::table('REF_REGION')
   					->select('REF_REGION.REGIONCODE')
   					->get();
   		return $region;
   	}

   	//GETS ALL THE INFORMATION ABOUTA DISASER THAN HAPPENED IN A REGION
   	public static function getYearlyReportData()
   	{
   		$yearlyData = DB::table('REF_GLIDEEVENTTYPE')
   						/*->join('GLIDEEVENT', 'REF_GLIDEEVENTTYPE.GLIDEEVENTTYPECODE','=','GLIDEEVENT.GLIDEEVENTTYPECODE')
   						->join('PDNA','GLIDEEVENT.GLIDEEVENTID','=','PDNA.GLIDEEVENT_GLIDEEVENTID')
   						->join('REF_BARANGAY','PDNA.BARANGAYID','=','REF_BARANGAY.BARANGAYID')
   						->join('REF_CITY/MUNICIPALITY','REF_BARANGAY.CITY/MUNICIPALITYID','=','REF_CITY/MUNICIPALITY.CITY/MUNICIPALITYID')
   						->join('REF_PROVINCE','REF_CITY/MUNICIPALITY.PROVINCEID','=','REF_PROVINCE.PROVINCEID')
   						->join('REF_REGION','REF_PROVINCE.REGIONCODE','=','REF_REGION.REGIONCODE')
   						->select('GLIDEEVENT.*','REF_GLIDEEVENTTYPE.*','PDNA.*','REF_BARANGAY.*','REF_CITY/MUNICIPALITY.*','REF_PROVINCE.*','REF_REGION.*')*/
   						->get();
   		return $yearlyData;
   	}
}
