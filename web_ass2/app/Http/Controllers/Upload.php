<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;

class Upload extends Controller
{
    public function upload(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'user_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust max file size as needed
        // ]);
           // echo ',imim';
        if ($request->hasFile('user_image') && $request->file('user_image')->isValid()) {
            $target_dir = "uploads/";
            $file = $request->file('user_image');
            echo public_path($target_dir);
            $target_file = $target_dir . basename($file->getClientOriginalName());
            echo "\n";
            echo $target_file;
            $user_name = $request->input('user_name');
            $user = User::where('user_name', $user_name)->first();
            echo $user;
            if ($user) {
                // Make changes to the user object as needed
                //$user->name = 'New Name'; // Example change
                $user->user_image = (string)$target_file;
                
                // Save the changes to the database
                try{
                    $user->save();
                }
                catch(\Exception $e){
                    return response()->json(['message' => 'Fail', 'error' => $e->getMessage()], 500);
                }       
                //
            
                //return response()->json(['message' => 'Record updated successfully']);
                echo 'Record updated successfully';

            } else {
                //return response()->json(['message' => 'User not found'], 404);
                echo 'User not found';
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