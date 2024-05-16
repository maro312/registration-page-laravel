<?php

use App\Models\testUser;
use Illuminate\Support\Facades\Mail;
use App\Mail\notification;


use Illuminate\Foundation\Testing\RefreshDatabase;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Upload;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

 
uses(RefreshDatabase::class);


test('upload photo' , function () {
    // Mock request with a file upload
    Storage::fake('public'); // Use a fake disk for file uploads
    $file = UploadedFile::fake()->image('avatar.jpg');
    $request = new \Illuminate\Http\Request();
    $request->merge(['user_name' => 'test_user']);
    $request->files->add(['user_image' => $file]);

    // Mock the user model and its behavior
    $userMock = Mockery::mock('alias:testUser');
    $userMock->shouldReceive('where')->with('user_name', 'test_user')->andReturnSelf(); // Mock user retrieval
    $userMock->shouldReceive('first')->andReturn(null); // Mock user not found
    $this->expectException(\Exception::class); // Expect exception when user not found

    // Call the controller method
    $controller = new Upload();
    $response = $controller->upload($request);

    // Assertions
    $this->assertEquals('No file uploaded or an error occurred during upload.', $response->exception->getMessage());
    $this->assertDatabaseMissing('testUsers', ['user_image' => 'uploads/avatar.jpg']); // Ensure no database changes
    Storage::disk('public')->assertMissing('uploads/avatar.jpg'); // Ensure file was not uploaded
}) ;




test('registration page' , function(){
    $response = $this->get('/');
    $response->assertStatus(200);
}) ;

