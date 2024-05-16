<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\testUser;
use Exception;

class Upload extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('user_image') && $request->file('user_image')->isValid()) {
            $target_dir = "uploads/";
            $file = $request->file('user_image');

            $target_file = $target_dir . basename($file->getClientOriginalName());

            $user_name = $request->input('user_name');
            $user = testUser::where('user_name', $user_name)->first();

            if ($user) {
                $user->user_image = (string)$target_file;
                try{
                    $user->save();
                }
                catch(\Exception $e){
                    return response()->json(['message' => 'Fail', 'error' => $e->getMessage()], 500);
                }       
            } else {
                throw new Exception("Sorry, there was an error uploading your file.");
            }
            // Move the uploaded file to the specified directory
            if ($file->move(public_path($target_dir), $target_file)) {
                return response()->json(['message' => 'File uploaded successfully']);
            } else {
                throw new Exception("Sorry, there was an error uploading your file.");
            }
        } else {
            throw new Exception("No file uploaded or an error occurred during upload.");
        }
    }
}