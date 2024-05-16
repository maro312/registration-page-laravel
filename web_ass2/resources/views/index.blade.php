@extends('layouts.master')
@section('content')

<div>
            <div class="header">
                <img src="/assests/logo.png" alt="Header Image">
            </div>

            <div class="container">

                <form id="registration-form" method="post">
                    @csrf
                    <div class="nav">
                        <div class="fcai-logo">
                            <img src="/assests/Faculty of Computers and AI Logo.jpg" alt="FCAI Logo">
                            <h2>FCAI</h2>
                        </div>
                        <div class="dropdown">
                            <button class="dropbtn">Language <i class="fas fa-caret-down"></i></button>
                            <div class="dropdown-content">
                                <a href="locale/en" id="en">English</a>
                                <a href="locale/ar" id="ar">عربي</a>
                            </div>
                        </div>
                    </div>


                    <div class="title">
                        <h2>{{__('messages.title')}}</h2>
                    </div>



                    <div class="form-row">
                        <div class="form-group">
                            <label for="full_name">{{__('messages.full_name')}}</label>
                            <input type="text" id="full_name" name="full_name" required
                                placeholder="{{__('messages.enter_your')}} {{__('messages.full_name')}}">
                            <span class="error-message" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="user_name">{{__('messages.user_name')}}</label>
                            <input type="text" id="user_name" name="user_name" required
                                placeholder="{{__('messages.enter_your')}} {{__('messages.user_name')}}">
                            <span class="error-message" style="color:red;"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="birthdate">{{__('messages.birth_date')}}:</label>
                            <input type="date" id="birthdate" name="birthdate" required
                                placeholder="Enter your birthdate">
                            <span class="error-message" style="color:red;"></span>
                            <span id="actors"></span>
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
                            <label for="password">{{__('messages.password')}}</label>
                            <input type="password" id="password" name="password" required
                                placeholder="{{__('messages.enter_your')}} {{__('messages.confirm_password')}}">
                            <span class="error-message" style="color:red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="confirm_password">{{__('messages.confirm_password')}}</label>
                            <input type="password" id="confirm_password" name="confirm_password" required
                                placeholder="{{__('messages.enter_your')}} {{__('messages.confirm_password')}}">
                            <span class="error-message" style="color:red;"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group" style="flex: 0 0 100%;">
                            <label for="user_image">{{__('messages.image')}}</label>
                            <input type="file" id="user_image" name="user_image" accept="image/*">
                            <span class="error-message" style="color:red;"></span>
                        </div>
                    </div>

                    <div class="buttons">
                        <button type="submit">{{__('messages.register')}}</button>
                        <button type="submit" id="checkBirthdate">{{__('messages.birth_date_born_to_day')}}</button>
                    </div>



                </form>

            </div>
        </div>

@endsection