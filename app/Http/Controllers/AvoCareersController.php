<?php 

namespace App\Http\Controllers;

use View;
use App\AvoCareer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Routing\Controller as BaseController;

class AvoCareersController extends BaseController {

    public function careerpage() {

        return view('apply');
    }

    public function store(Request $request)
    {

        $avoCareer = new AvoCareer;
        $avoCareer->resume = $request->resume;
        $avoCareer->save();

        $fileName = $avoCareer->id . '.' . 
        $request->file('resume')->getClientOriginalExtension();

        $request->file('resume')->move(
            base_path() . '/public/uploads', $fileName
        );

        return redirect('apply');
    
    }

}


?>