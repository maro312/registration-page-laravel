<?php 
use App\Models\testUser;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\UniqueConstraintViolationException;



uses(RefreshDatabase::class);


test('Testing database connection', function () {
    $connection = new PDO('mysql:host=localhost;dbname=advanced_web', 'root', '');
    $this->assertNotNull($connection);   
});


test('models can be instantiated', function () {
    $user = new testUser();
    $user->full_name = 'Marwan Ahmed';
    $user->user_name = 'marwanahmed';
    $user->birthdate = '2000-01-01';
    $user->phone = '01000000000';
    $user->address = 'Cairo, Egypt';
    $user->password = '0123456789'; // Note: Hash password before saving in production
    $user->email = 'test@test.com';
    $userToToBeSaved = $user->save();
    $this->assertNotNull($userToToBeSaved);
});



test('server side validation no duplicated username' , function(){
    $user = new testUser();
    $user->full_name = 'Marwan Ahmed';
    $user->user_name = 'marwanahmed';
    $user->birthdate = '2000-01-01';
    $user->phone = '01000000000';
    $user->address = 'Cairo, Egypt';
    $user->password = '0123456789'; // Note: Hash password before saving in production
    $user->email = 'test@test.com' ;
    $userToToBeSaved = $user->save();
    $this->assertNotNull($userToToBeSaved);
    $user = new testUser();
    $user->full_name = 'Marwan Ahmed';
    $user->user_name = 'marwanahmed';
    $user->birthdate = '2000-01-01';
    $user->phone = '01000000000';
    $user->address = 'Cairo, Egypt';
    $user->password = '0123456789'; // Note: Hash password before saving in production
    $user->email = 'test' ;
    $this->expectException(UniqueConstraintViolationException::class);
    $userToToBeSaved = $user->save();
    $this->assertNotNull($userToToBeSaved);
}) ;