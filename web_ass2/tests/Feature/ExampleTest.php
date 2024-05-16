<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\testUser;

uses(RefreshDatabase::class);

it('returns a successful response', function () {
    $response = $this->get('/');
    
    $response->assertStatus(200);
});

test ('Test Registration '  ,function () {
    $response = $this->post('/user', [
        'full_name' => 'Sally',
        'user_name' => 'Sally',
        'birthdate' => '2024-05-16',
        'phone' => '123456789',
        'address' => 'Cairo',
        'password' => '123456789',
        'email' => 'test@test.com' ,
    ]);
    $response->assertStatus(200);
    $this->assertDatabaseHas('test_users', [
        'user_name' => 'Sally',
    ]);
});


