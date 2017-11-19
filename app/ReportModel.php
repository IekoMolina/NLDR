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

    public static function getDistinctDate()
    {
      $dates = DB::table('GLIDEEVENT')
                //date('Y', strtotime( $d->STARTDATE))
                //->select('STARTDATE')
                //->distinct(DB::raw('YEAR(STARTDATE)'), '=', date('Y'))
                ->distinct()
                ->orderBy('STARTDATE')//also order by date
                ->get(['STARTDATE']);  
      return $dates;
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

   	public static function getReportData()
   	{
   		$yearlyData = DB::table('REF_GLIDEEVENTTYPE')
   						->join('GLIDEEVENT', 'REF_GLIDEEVENTTYPE.GLIDEEVENTTYPECODE','=','GLIDEEVENT.GLIDEEVENTTYPECODE')
   						->join('PDNA','GLIDEEVENT.GLIDEEVENTID','=','PDNA.GLIDEEVENTID')
              ->join('PDNADETAILS','PDNA.PDNAID','=','PDNADETAILS.PDNAID')
              ->join('REF_INCIDENT','PDNA.INCIDENTTYPECODE','=','REF_INCIDENT.INCIDENTTYPECODE')
              ->join('REF_INCIDENTSOURCE','REF_INCIDENT.INCIDENTSOURCEID','=','REF_INCIDENTSOURCE.INCIDENTSOURCEID') 
              ->join('RESETTLEMENT','PDNADETAILS.RESETTLEMENTID','=','RESETTLEMENT.RESETTLEMENTID')
              //recovery
              ->join('INFRA','PDNADETAILS.INFRAID','=','INFRA.INFRAID')//infra
              ->join('LIVELIHOOD','PDNADETAILS.LIVELIHOODID','=','LIVELIHOOD.LIVELIHOODID')//livelihhod
              ->join('REF_LIVELIHOODDMG','LIVELIHOOD.LIVELIHOODDMGID','=','REF_LIVELIHOODDMG.LIVELIHOODDMGID')
              ->join('SOCIAL','PDNADETAILS.SOCIALID','=','SOCIAL.SOCIALID')//social
              //subsector Should it be where in?? or join pa din
              //ref_dmg same here?
   						->join('REF_CITY/MUNICIPALITY','PDNADETAILS.CITY/MUNICIPALITYID','=','REF_CITY/MUNICIPALITY.CITY/MUNICIPALITYID')
   						->join('REF_PROVINCE','REF_CITY/MUNICIPALITY.PROVINCEID','=','REF_PROVINCE.PROVINCEID')
   						->join('REF_REGION','REF_PROVINCE.REGIONCODE','=','REF_REGION.REGIONCODE')
   						->select('GLIDEEVENT.*','REF_GLIDEEVENTTYPE.*','PDNA.*','REF_CITY/MUNICIPALITY.*','REF_PROVINCE.*','REF_REGION.*','PDNADETAILS.*')
   						->get();
   		return $yearlyData;
   	}

    //GETS ALL THE INFORMATION ABOUTA DISASER THAN HAPPENED IN A REGION
    public static function getReportDataFiltered($req)
    {
        $disasterType = $req->input('disasterType');
        $year = $req->input('year');

            $yearlyData = DB::table('REF_GLIDEEVENTTYPE')
              ->join('GLIDEEVENT', 'REF_GLIDEEVENTTYPE.GLIDEEVENTTYPECODE','=','GLIDEEVENT.GLIDEEVENTTYPECODE')
              ->join('PDNA','GLIDEEVENT.GLIDEEVENTID','=','PDNA.GLIDEEVENTID')
              ->join('PDNADETAILS','PDNA.PDNAID','=','PDNADETAILS.PDNAID')
              ->join('REF_INCIDENT','PDNA.INCIDENTTYPECODE','=','REF_INCIDENT.INCIDENTTYPECODE')
              ->join('REF_INCIDENTSOURCE','REF_INCIDENT.INCIDENTSOURCEID','=','REF_INCIDENTSOURCE.INCIDENTSOURCEID') 
              ->join('RESETTLEMENT','PDNADETAILS.RESETTLEMENTID','=','RESETTLEMENT.RESETTLEMENTID')
              ->join('LIVELIHOOD','PDNADETAILS.LIVELIHOODID','=','LIVELIHOOD.LIVELIHOODID')//livelihhod
              ->join('REF_LIVELIHOODDMG','LIVELIHOOD.LIVELIHOODDMGID','=','REF_LIVELIHOODDMG.LIVELIHOODDMGID')
              ->join('INFRA','PDNADETAILS.INFRAID','=','INFRA.INFRAID')//infra
              /*->join('RECOVERY','PDNADETAILS.PDNAID','=','RECOVERY.PDNAID')//recovery
              ->join('TASKS','RECOVERY.PROJECTID','=','TASKS.PROJECTID')//TASKS
              ->join('REF_AGENCY','TASKS.AGENCYID','=','REF_AGENCY.AGENCYID')//Agency  
              
              ->join('SOCIAL','PDNADETAILS.SOCIALID','=','SOCIAL.SOCIALID')//social
              //subsector Should it be where in?? or join pa din
              //->join('')//ref_dmg same here?*/
              ->join('REF_CITY/MUNICIPALITY','PDNADETAILS.CITY/MUNICIPALITYID','=','REF_CITY/MUNICIPALITY.CITY/MUNICIPALITYID')
              ->join('REF_PROVINCE','REF_CITY/MUNICIPALITY.PROVINCEID','=','REF_PROVINCE.PROVINCEID')
              ->join('REF_REGION','REF_PROVINCE.REGIONCODE','=','REF_REGION.REGIONCODE')
              //->select('GLIDEEVENT.*','REF_GLIDEEVENTTYPE.*','PDNA.*','REF_CITY/MUNICIPALITY.*','REF_PROVINCE.*','REF_REGION.*','PDNADETAILS.*')
              ->select('REF_GLIDEEVENTTYPE.DESCRIPTION as RGDESC','PDNA.INCIDENTNAME','PDNA.STARTDATE','REF_REGION.REGIONCODE','REF_PROVINCE.DESCRIPTION','REF_CITY/MUNICIPALITY.DESCRIPTION',
                     'PDNADETAILS.AFFECTEDFAM','PDNADETAILS.AFFECTEDPER','PDNADETAILS.DEAD','PDNADETAILS.INJURED','PDNADETAILS.MISSING','RESETTLEMENT.DMGHOUSES','RESETTLEMENT.DESHOUSES','LIVELIHOOD.DAMAGES as LDMG','INFRA.DAMAGES as IDMG', DB::raw('LIVELIHOOD.DAMAGES + INFRA.DAMAGES as totalDMG'))
              ->where([
                          ['REF_GLIDEEVENTTYPE.DESCRIPTION', '=', $disasterType],
                          ['GLIDEEVENT.STARTDATE', '=', $year] 
                      ])

              ->get();
              //Only all infra damages that are DMGLOSSTYPEID (0=na,1=public,2=private)
      return $yearlyData;
    }
    /*
    public static function getPDNA()
    {
      $pdnaData = DB::table('')
    }

    public static function getSector()
    {
      $sectorData = DB::table('')
    }

    public static function getLocation()
    {
      $pdnaData = DB::table('')
    }
    */
}
