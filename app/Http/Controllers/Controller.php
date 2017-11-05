<?php 
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function insert(Request $req)
    {
        $firstname = $req->input('firstName');
        $lastname = $req->input('lastName');

        $data = array('firstName'=>$firstname,'lastName'=>$lastname);

        DB::table('users')->insert($data);
        
        return redirect ('/');
    }

    public function getData()
    {
        $data['data'] = DB::table('users')->get();

        if(count($data)>0)
        {
            return view('insertForm', $data);
        }

        else
        {
            return view('insertForm');
        }
    }

    public function delete($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect ('/');
    }
}


