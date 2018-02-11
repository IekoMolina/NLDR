    <?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Create and Delete User Routes
Route::get('users', 'UsersController@getData');
Route::post('/insert','UsersController@insert');
Route::get('/delete/{id}', ['uses' =>'UsersController@delete']);

Route::get('about', function () {
    $arrayTest = [];
    return view('about', compact('arrayTest')); //about.blade.php
});

// Model Practice Routes
Route::resource('practice', 'PracticeController');

// HOME Routes
Route::get('home', function () {
    return view('home'); //home.blade.php
});

Route::get('reportsV2', function () {
    return view('reportsV2'); //home.blade.php
});

Route::get('homeAdministrator', function () {
    return view('homeAdministrator'); //homeAdministrator.blade.php
});

Route::get('homeOCD', function () {
    return view('homeOCD'); //homeOCD.blade.php
});  

Route::get('homeDrillDown', function () {
    return view('homeDrillDown'); //homeDrillDown.blade.php
}); 

Route::get('homeDrillDown1', function () {
    return view('homeDrillDown1'); //homeDrillDown1.blade.php
});  

// Login Routes
Route::get('login', function () {
    return view('login'); //login.blade.php
});  

// Encoding Routes
Route::get('encodingNewDisaster',  function () {
    return view('encodingNewDisaster');//encodingNewDisaster.blade.php 
});

Route::get('encodingNewDisasterAdditional',  function () {
    return view('encodingNewDisasterAdditional');//encodingNewDisasterAdditional.blade.php 
});

Route::get('encodingNewDisasterCity', function () {
    return view('encodingNewDisasterCity'); //encodingNewDisasterCity.blade.php
}); 

Route::get('encodingNewDisasterDetails', function () {
    return view('encodingNewDisasterDetails'); //encodingNewDisasterDetails.blade.php
}); 

Route::get('encodingCyclone', function () {
    return view('encodingCyclone'); //encodingCyclone.blade.php
}); 

Route::get('encodingCycloneDetails', function () {
    return view('encodingCycloneDetails'); //encodingCycloneDetails.blade.php
}); 

Route::get('updateDisasterInfo', function () {
    return view('encodingUpdateDisasterInfo'); //updateDisasterInfo.blade.php
}); 

Route::get('updateDisasterInfoDetails', function () {
    return view('encodingUpdateDisasterInfoDetails'); //updateDisasterInfoDetails.blade.php
}); 


Route::get('assignRoles', function () {
    return view('assignRoles'); //assignRoles.blade.php
}); 


// Routes for Report Generation
Route::get('reports', 'reportController@getData');
Route::post('generateReport', 'reportController@passData');
Route::get('reportsVisual', 'reportController@getDataVisual'); 
Route::post('generateReportVisuals', 'reportController@passDataVisual');   

// Account Creattion routes
Route::get('adminCreateAccount', function () {
    return view('adminCreateAccount'); 
}); 

Route::get('adminRemoveAccount', function () {
    return view('adminRemoveAccount'); //updateDisasterInfoDetails.blade.php
});   

//Route for Query Building
//Route::get('queryBuild', 'queryController@getData');

//Route for File Upload
Route::get('/uploadfile','UploadFileController@careerpage');
Route::post('/uploadfile','UploadFileController@store');  

Route::get('apply', 'AvoCareersController@careerpage');
Route::post('apply', 'AvoCareersController@store');

//Test Routes
Route::get('queryBuild',array('as'=>'queryBuild','uses'=>'queryController@getData'));
Route::get('queryBuild/ajax/{id}',array('as'=>'queryBuild.ajax','uses'=>'queryController@getSubsectorAjax'));
Route::get('queryBuildR/ajax/{id}',array('as'=>'queryBuildR.ajax','uses'=>'queryController@getProvinceAjax'));
Route::get('queryBuildC/ajax/{id}',array('as'=>'queryBuildC.ajax','uses'=>'queryController@getCityAjax'));
Route::post('/queryResult', 'queryController@passData');