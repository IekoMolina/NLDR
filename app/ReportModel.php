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
       	$existingData = DB::table('DISASTER')
       					->select('DISASTER.*')
       					->get();
       	return $existingData;
   	}

    public static function getDistinctDate()
    {
      $dates = DB::table('DISASTER')
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
            $yearlyData = DB::table('DISASTER')
              ->join('DISASTERTYPE', 'DISASTER.DISTYPEID','=','DISASTERTYPE.DISTYPEID')
              ->join('LOCALITY','DISASTER.LOCALITYID','=','LOCALITY.LOCALITYID') 
              ->join('PROVINCE','LOCALITY.PROVID','=','PROVINCE.PROVID')
              ->join('REGION','PROVINCE.REGIONID','=','REGION.REGIONID') 
              //->innerJoin('ASSETS_DMG','ASSETS_DMG.DISASTERID','=','DISASTER.DISASTERID')
              //->join('ASSETS_LOSS','ASSETS_LOSS.DISASTERID','=','DISASTER.DISASTERID') 
              //->join('AGRI_LOSS','AGRI_LOSS.DISASTERID','=','DISASTER.DISASTERID')
              //->join('PROD_LOSS','PROD_LOSS.DISASTERID','=','DISASTER.DISASTERID')
              //->join('MACROECON_LOSS','MACROECON_LOSS.DISASTERID','=','DISASTER.DISASTERID')
              ->select('DISASTER.DISASTERNAME','DISASTER.STARTDATE','DISASTER.ENDDATE', 'DISASTERTYPE.DISASTERTYPE',
                                              DB::raw('COUNT(DISASTER.LOCALITYID) as CLOC'),
                                              DB::raw('SUM(DISASTER.AFFECTEDPERS) as SDAP'),
                                              DB::raw('SUM(DISASTER.EVACPERS) as SEP'),
                                              DB::raw('SUM(DISASTER.DEAD) as SDEAD'),
                                              DB::raw('SUM(DISASTER.INJURED) as SINJ'),
                                              DB::raw('SUM(DISASTER.MISSING) as SMISS')
                                              //DB::raw('SUM(ASSETS_DMG.TOTALDMGS) as ADT')
                                             // DB::raw('SUM(ASSETS_LOSS.TOTAL) as ALT'),
                                             // DB::raw('SUM(AGRI_LOSS.TOTAL) as AGLT'),
                                              //DB::raw('SUM(PROD_LOSS.ESTLOSSCOST) as PLT'),
                                             // DB::raw('SUM(PROD_LOSS.ESTLOSSCOST) + SUM(AGRI_LOSS.TOTAL) + SUM(ASSETS_LOSS.TOTAL) as totalLoss') 
                        )
              ->where([
                          ['DISASTERTYPE.DISASTERTYPE', '=', $disasterType],
                          ['DISASTER.STARTDATE', 'LIKE', '%'.$year.'%']
                      ])
              ->groupBy('DISASTER.DISASTERNAME','DISASTER.STARTDATE','DISASTER.ENDDATE','DISASTERTYPE.DISASTERTYPE')
              ->get();
              //Only all infra damages that are DMGLOSSTYPEID (0=na,1=public,2=private)
      return $yearlyData;
    }

        //GETS ALL THE INFORMATION ABOUTA DISASER THAN HAPPENED IN A REGION
    public static function getReportDataFilteredVisual  ($req)
    {
        $disasterType = $req->input('disasterType');
        $year = $req->input('year');

            $yearlyData = DB::table('DISASTER')
              ->join('DISASTERTYPE', 'DISASTERTYPE.DISTYPEID','=','DISASTER.DISTYPEID')
              ->join('DISASTERSOURCE','DISASTERSOURCE.DISSOURCEID','=','DISASTERTYPE.DISSOURCEID')
              ->join('LOCALITY','LOCALITY.LOCALITYID','=','DISASTER.LOCALITYID')
              ->join('LOCALITYTYPE','LOCALITYTYPE.LOCTYPEID','=','LOCALITY.LOCTYPEID')
              ->join('PROVINCE','PROVINCE.PROVID','=','LOCALITY.PROVID')
              ->join('REGION','REGION.REGIONID','=','PROVINCE.REGIONID') 
              ->join('ISLANDGRP','ISLANDGRP.ISLANDGRPID','=','REGION.ISLANDGRPID')
              ->join('NEEDS','NEEDS.DISASTERID','=','DISASTER.DISASTERID')
              ->join('TASK','TASK.TASKID','=','NEEDS.TASKID')
              ->join('TASKTYPE','TASKTYPE.TASKTYPEID','=','TASK.TASKTYPEID')
              ->join('AGENCY','AGENCY.AGENCYID','=','TASK.AGENCYID')
              ->join('ASSETS_LOSS','ASSETS_LOSS.DISASTERID','=','DISASTER.DISASTERID')
              ->join('AGRI_LOSS','AGRI_LOSS.DISASTERID','=','DISASTER.DISASTERID')
              ->join('PROD_LOSS','PROD_LOSS.DISASTERID','=','DISASTER.DISASTERID')
              ->join('MACROECON_LOSS','MACROECON_LOSS.DISASTERID','=','DISASTER.DISASTERID')
              ->join('ASSETS_DMG','ASSETS_DMG.DISASTERID','=','DISASTER.DISASTERID')
              ->join('ASSETS','ASSETS.ASSETSID','=','ASSETS_DMG.ASSETSID')
              ->join('ASSET_CATEGORY','ASSET_CATEGORY.ASSETCATEGORYID','=','ASSETS.ASSETCATEGORYID')
              ->join('CATEGORY','CATEGORY.CATEGORYID','=','ASSET_CATEGORY.CATEGORYID')
              //STOEPD HERE MUNA HANAPIN YUNG DAMAED HOUSE ANF SHIT
              /* ->select('DISASTERTYPE.DISASTERTYPE as RGDESC','DISASTER.DISASTERNAME','DISASTER.STARTDATE','DISASTER.ENDDATE','REGION.REGIONCODE','PROVINCE.PROVINCE','LOCALITY.LOCALITYNAME',
                     'DISASTER.AFFECTEDFAM','DISASTER.AFFECTEDPERS','DISASTER.DEAD','DISASTER.INJURED','DISASTER.MISSING','RESETTLEMENT.DMGHOUSES','RESETTLEMENT.DESHOUSES','LIVELIHOOD.DAMAGES as LDMG','INFRA.DAMAGES as IDMG', DB::raw('LIVELIHOOD.DAMAGES + INFRA.DAMAGES as totalDMG')) //REST:EMENT AND DAMGE HOUSES FIND IT
                     //

                WORKING SELECT
                              ->select('DISASTERTYPE.DISASTERTYPE as RGDESC','DISASTER.DISASTERNAME','DISASTER.STARTDATE','DISASTER.ENDDATE','REGION.REGIONCODE','PROVINCE.PROVINCE','LOCALITY.LOCALITYNAME',
                     'DISASTER.AFFECTEDFAM','DISASTER.AFFECTEDPERS','DISASTER.DEAD','DISASTER.INJURED','DISASTER.MISSING','ASSETS_DMG.DMGQTY','ASSETS_DMG.DESQTY','ASSETS_DMG.TOTALDMGS as LDMG','AGRI_LOSS.TOTAL as IDMG', DB::raw('ASSETS_DMG.TOTALDMGS + AGRI_LOSS.TOTAL as totalDMG') )
              */

              ->select('DISASTERTYPE.DISASTERTYPE as RGDESC','DISASTER.DISASTERNAME','DISASTER.STARTDATE','DISASTER.ENDDATE','REGION.REGIONCODE','PROVINCE.PROVINCE','LOCALITY.LOCALITYNAME',
                     'DISASTER.AFFECTEDFAM','DISASTER.AFFECTEDPERS','DISASTER.DEAD','DISASTER.INJURED','DISASTER.MISSING','RESETTLEMENT.DMGHOUSES','RESETTLEMENT.DESHOUSES','LIVELIHOOD.DAMAGES as LDMG','INFRA.DAMAGES as IDMG', DB::raw('LIVELIHOOD.DAMAGES + INFRA.DAMAGES as totalDMG')) //REST:EMENT AND DAMGE HOUSES FIND IT
              ->where([
                          ['DISASTERTYPE.DISASTERTYPE', '=', $disasterType],
                          ['DISASTER.STARTDATE', 'LIKE', '%'.$year.'%'] 

                      ])

              ->get();
              //Only all infra damages that are DMGLOSSTYPEID (0=na,1=public,2=private)
              /*

              */
      return $yearlyData;
    }
}
