<?php 
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function insert(Request $req)
    {
        $firstname = $req->input('firstName');
        $lastname = $req->input('lastName');
        $username = $req->input('userName');
        $password = bcrypt($req->input('password')); //encrypt ()
        $email = $req->input('email');
        $position = $req->input('position');
        $status = 1;

        $data = array('USERSTATUSID'=>$status,'USERTITLESID'=>$position,'FIRSTNAME'=>$firstname,'LASTNAME'=>$lastname,'USERNAME'=>$username,'PASSWORD'=>$password,'EMAIL'=>$email);

        DB::table('users')->insert($data);
        
        return redirect ('users');
    }

    public function getData()
    {
        $data['data'] = DB::table('users')->get();

        if(count($data)>0)
        {
            return view('users', $data);
        }

        else
        {
            return view('users');
        }
    }

    public function delete($id)
    {
        DB::table('users')->where('USERID',$id)->delete();
        return redirect ('users');
    }
}


