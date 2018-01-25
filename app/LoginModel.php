<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
class LoginModel extends Model
{
  
	   public static function GetUserData() 
	   {
                    $existingData = DB::table('USERS')
                    ->select('USERS.USERNAME', 'USERS.PASSWORD')
                    ->get();
            return $existingData;
           }
           
           

}
