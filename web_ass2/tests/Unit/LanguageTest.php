<?php
test ('Arabic language' , function(){
    App::setLocale('ar');
    Session::put('locale', 'ar');
    $response = $this->get('/');
    $response->assertSee('اهلا بكم في صفحة التقديم');
}) ;

test ('English language' , function(){
    App::setLocale('en');
    Session::put('locale', 'en');
    $response = $this->get('/');
    $response->assertSee('Welcome to the Registration Page');
}) ;