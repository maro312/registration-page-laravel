@extends('layouts.master')
@section('content')

<div class="registration-form">
    <h2 >{{__('messages.title')}}</h2>


    <form id="registration-form" method="post">

        <div class="form-row">
            <div class="form-group">
                <label for="full_name">{{__('messages.full_name')}}</label>
                <input type="text" id="full_name" name="full_name" required placeholder= "{{__('messages.enter_your')}} {{__('messages.full_name')}}">
                <span class="error-message" style="color:red;"></span>
            </div>

            <div class="form-group">
                <label for="user_name">{{__('messages.user_name')}}</label>
                <input type="text" id="user_name" name="user_name" required placeholder="{{__('messages.enter_your')}} {{__('messages.user_name')}}">
                <span class="error-message" style="color:red;"></span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="birthdate">{{__('messages.birth_date')}}</label>
                <input type="date" id="birthdate" name="birthdate" required value="">
                <span class="error-message" style="color:red;"></span>
                <span id = "actors"></span>
            </div>

            <div class="form-group">
                <label for="phone">{{__('messages.phone')}}</label>
                <input type="tel" id="phone" name="phone" required placeholder="{{__('messages.enter_your')}} {{__('messages.phone')}}">
                <span class="error-message" style="color:red;"></span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="address">{{__('messages.address')}}</label>
                <input type="text" id="address" name="address" required placeholder="{{__('messages.enter_your')}} {{__('messages.address')}}">
                <span class="error-message" style="color:red;"></span>
            </div>

            <div class="form-group">
                <label for="email">{{__('messages.email')}}</label>
                <input type="email" id="email" name="email" required placeholder="{{__('messages.enter_your')}} {{__('messages.email')}}">
                <span class="error-message" style="color:red;"></span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="password"> {{__('messages.password')}}</label>
                <input type="password" id="password" name="password" required placeholder="{{__('messages.enter_your')}} {{__('messages.password')}}">
                <span class="error-message" style="color:red;"></span>
            </div>

            <div class="form-group">
                <label for="confirm_password">{{__('messages.confirm_password')}}</label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="{{__('messages.enter_your')}} {{__('messages.confirm_password')}}">
                <span class="error-message" style="color:red;"></span>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="user_image">{{__('messages.image')}}</label>
                <input type="file" id="user_image" name="user_image" accept="image/*">
                <span class="error-message" style="color:red;"></span>
            </div>
        </div>

        <button type="submit">{{__('messages.register')}}</button>
        <button id = "checkBirthdate" style="margin-top : 20px" >{{__('messages.birth_date_born_to_day')}}</button>
        <button id = "checkBirthdate" style="margin-top : 20px" ><a style = "" href="locale/ar">عربي</a></button>
        <button id = "checkBirthdate" style="margin-top : 20px" ><a href="locale/en">English</a></button>
    </form>
</div>


@endsection

