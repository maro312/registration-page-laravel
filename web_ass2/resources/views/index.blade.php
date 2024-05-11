<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registration Form</title>

</head>
<body>
    @extends('layouts.master')
    @section('content')
    <div class="registration-form">
        <h2>Registration Form</h2>

        <form id="registration-form" method="post">

            <div class="form-row">
                <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" required placeholder="Enter your full name">
                    <span class="error-message" style="color:red;"></span>
                </div>

                <div class="form-group">
                    <label for="user_name">User Name:</label>
                    <input type="text" id="user_name" name="user_name" required placeholder="Enter your username">
                    <span class="error-message" style="color:red;"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="birthdate">Birthdate:</label>
                    <input type="date" id="birthdate" name="birthdate" required placeholder="Enter your birthdate">
                    <span class="error-message" style="color:red;"></span>
                    <span id = "actors"></span>
                </div>

                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required placeholder="Enter your phone number">
                    <span class="error-message" style="color:red;"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required placeholder="Enter your address">
                    <span class="error-message" style="color:red;"></span>
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                    <span class="error-message" style="color:red;"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                    <span class="error-message" style="color:red;"></span>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm your password">
                    <span class="error-message" style="color:red;"></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="user_image">User Image:</label>
                    <input type="file" id="user_image" name="user_image" accept="image/*">
                    <span class="error-message" style="color:red;"></span>
                </div>
            </div>

            <button type="submit">Register</button>
            <button id = "checkBirthdate" style="margin-top: 20px" >Birthdate</button>
        </form>
    </div>



    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">  </script>
    <script src = 'API_Ops.js'></script>
    <script>
        let inputElements = document.getElementsByTagName("input") ;
        for (let i = 0 ; i < inputElements.length ; i ++) {
            inputElements[i].addEventListener('input' , function () {
                this.nextElementSibling.textContent = "" ;
            })
        }
        document.getElementById("registration-form").addEventListener("submit", function(e) {
        e.preventDefault();

        var valid = true;

        function showError(input, message) {
            var errorElement = input.nextElementSibling;
            errorElement.textContent = message;
            valid = false;
        }

        function clearError(input) {
            var errorElement = input.nextElementSibling;
            errorElement.textContent = "";
        }

        function validateRequired(input, fieldName) {
            if (input.value.trim() === "") {
                showError(input, "Please enter your " + fieldName + ".");
            } else {
                clearError(input);
            }
        }

        function validateStrongPassword(input, fieldName) {
            const password = input.value;
            const numberPattern = /\d/;
            const specialCharPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;

            if (password.length < 8) {
                showError(input, `${fieldName} must be at least 8 characters long.`);
            } else if (!numberPattern.test(password)) {
                showError(input, `${fieldName} must contain at least 1 number.`);
            } else if (!specialCharPattern.test(password)) {
                showError(input, `${fieldName} must contain at least 1 special character.`);
            } else {
                clearError(input);
            }
        }


        function validatePasswordMatch(password, confirmPassword) {
            if (password.value !== confirmPassword.value) {
                showError(confirmPassword, "Passwords do not match.");
            } else {
                clearError(confirmPassword);
            }
        }
        validateRequired(document.getElementById("full_name"), "full name");
        validateRequired(document.getElementById("user_name"), "username");
        validateRequired(document.getElementById("birthdate"), "birthdate");
        validateRequired(document.getElementById("phone"), "phone number");
        validateRequired(document.getElementById("address"), "address");
        validateRequired(document.getElementById("email"), "email");
        validateRequired(document.getElementById("password"), "password");
        validateRequired(document.getElementById("confirm_password"), "confirm password");
        validateRequired(document.getElementById("user_image"), "profile picture");
        //validateStrongPassword(document.getElementById("password"), "password");
        //validatePasswordMatch(document.getElementById("password"), document.getElementById("confirm_password"));
        if (valid) {
            console.log('mm');
            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            var xhr2 = new XMLHttpRequest();
            xhr2.open('POST', '/upload', true);
            xhr.open('POST', '/user', true); // Assuming '/user' is your route
            xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}'); // Include CSRF token
            xhr2.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            xhr2.onload = function(){
                if (xhr2.status >= 200 && xhr2.status < 300) {
                // Request was successful, handle response
                console.log(xhr2.responseText)
                // let response = JSON.parse(xhr.responseText);
                // if (response['message'] === "Success") {
                //     alert("Successful");
                // } else {
                //     showError(document.getElementById("user_name"), "duplicated");
                //     // alert("Duplicated user name")
                // }
            } 
            else {
                // Request failed, handle error
                console.error('Request failed: ' + xhr2.responseText);
            }
            }
            //xhr2.send(formData);
            //console.log('{{ csrf_token() }}');
            xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful, handle response
                xhr2.send(formData);
                console.log(xhr.responseText);
                // let response = JSON.parse(xhr.responseText);
                // if (response['message'] === "Success") {
                //     alert("Successful");
                // } else {
                //     showError(document.getElementById("user_name"), "duplicated");
                //     // alert("Duplicated user name")
                // }
            } 
            else {
                // Request failed, handle error
                console.error('Request failed: ' + xhr.responseText);
            }
            };
            xhr.send(formData);
        }
    });



    </script>
    @endsection

</body>
</html>
