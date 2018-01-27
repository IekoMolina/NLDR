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

   	public static function getAllDisaster()
   	{
   		$disasterData = DB::table('DISASTERTYPE')
   						  ->select('DISASTERTYPE.DISASTERTYPE')
   						  ->get();
   		return $disasterData; 
   	}

   	public static function getAllRegion()
   	{
   		$region = DB::table('REGION')
   					->select('REGION.REGIONCODE')
   					->get();
   		return $region;
   	}
}
