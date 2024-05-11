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

// Route::get('/test' , function(Request $request){
    
//     try {
        
//         return response()->json(['message' => 'Success'], 200);
//     }catch (Exception $e){
//         return response()->json(['message' => 'Fail', 'error' => $e->getMessage()], 500);
//     }
    
// });

//Route::post('/user', [UserController::class,'yarab']);


/*Route::post('/user', function(Request $request){
    echo $request;
});
*/
//Route::get('/user', [::class, 'index']);
