<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Mail\SendMail;
// use Illuminate\Support\Facades\Mail;

class DB_Ops extends Controller
{
    
    public function store(Request $request){
        echo 'yarab';
        // $request->validate([
        //     'full_name' => 'required',
        //     'user_name' => 'required|unique:user',
        //     'birthdate' => 'required|date',
        //     'phone' => 'required',
        //     'address' => 'required',
        //     'password' => 'required',
        //     'email' => 'required|email|unique:user',
        //     'user_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        $fullname = $request->input('full_name');
        $user_name = $request->input('user_name');
        $birthdate = $request->input('birthdate');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $password = Hash::make($request->input('password')) ;
        $email = $request->input('email');

        // Inside your controller or wherever you want to send the email
        // $emailData = ['name' => 'John Doe',
        // 'order_id' => '123456',
        // 'products' => [
        //     ['name' => 'Product 1', 'price' => '$10'],
        //     ['name' => 'Product 2', 'price' => '$20'],
        //     ['name' => 'Product 3', 'price' => '$15'],
        // ],
        // 'total_price' => '$45',
        // 'shipping_address' => '123 Main St, Anytown, USA',]; // Data to pass to the email template
        // $recipientEmail = 'marawan.ah.ab@gmail.com';
        // echo 'Done El Done' ;

        // Mail::to($recipientEmail)->send(new SendMail($emailData));

        // $enc_password = Hash::make($password) ;
        // if (Hash::check($password, $enc_password)) {
        //     echo 'Done' ;
        // }
        // echo $enc_password ;


        //$user_image = $request->input('user_image');
        //echo $user_image;
        
        try {
            $user = new User;
            $user->full_name = $fullname;
            $user->user_name = $user_name;
            $user->birthdate = $birthdate;
            $user->phone = $phone;
            $user->address = $address;
            $user->password = $password; // Note: Hash password before saving in production
            $user->email = $email;
            $user->save();

            return response()->json(['message' => 'Success'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Fail', 'error' => $e->getMessage()], 500);
            //echo $request;
        }
        
    }
    //
}
