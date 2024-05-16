<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\testUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Mail\notification;
use Illuminate\Database\UniqueConstraintViolationException;
// use App\Mail\SendMail;
// use Illuminate\Support\Facades\Mail;

class DB_Ops extends Controller
{   
    // public function test(){
    //     Mail::to('marwan.ah.ab@gmail.com')->send(new MailableName());
    // }
    
    public function store(Request $request){
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

        Mail::to('esla889900@gmail.com')->send(new notification($user_name));

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
            $user = new testUser();
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
            if ($e instanceof UniqueConstraintViolationException) {
                return response()->json(['message' => 'Fail', 'error' => 'Username already exists'], 400);
            }
            return response()->json(['message' => 'Fail', 'error' => $e::class], 500);
            //echo $request;
        }
        
    }
    //
}
