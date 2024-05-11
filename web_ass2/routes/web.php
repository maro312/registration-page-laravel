<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DB_Ops;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use App\Http\Controllers\Upload;


Route::get('/', function () {
    return view('index');
});

Route::post('/user', [DB_Ops::class,'store']);
Route::post('/upload', [Upload::class, 'upload'])->name('upload');

//Route::post('/user', [UserController::class,'yarab']);


/*Route::post('/user', function(Request $request){
    echo $request;
});
*/
//Route::get('/user', [::class, 'index']);
