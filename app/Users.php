<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
class Users extends Model
{

    public static function selectUsers()
    {
	   	$users = DB::table('users')->get(); 
	   	return $users;
	            /*->join('contacts', 'users.id', '=', 'contacts.user_id')
	            ->join('orders', 'users.id', '=', 'orders.user_id')
	            ->select('users.*', 'contacts.phone', 'orders.price')*/
	                       
	}

    public function insertData(Request $req)
    {
		    DB::table('users')->insert([
		    ['email' => 'taylor@example.com', 'votes' => 0],
		    ['email' => 'dayle@example.com', 'votes' => 0]
		]);
    }


}
