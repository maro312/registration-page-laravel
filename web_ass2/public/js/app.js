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
validateStrongPassword(document.getElementById("password"), "password");
validatePasswordMatch(document.getElementById("password"), document.getElementById("confirm_password"));


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
            let response = JSON.parse(xhr.responseText);
            if (response['message'] === "Success") {
                alert("Successful");
            } else {
                showError(document.getElementById("user_name"), "duplicated");
                // alert("Duplicated user name")
            }
        } 
        else {
            // Request failed, handle error
            console.error('Request failed: ' + xhr2.responseText);
        }
    }
    xhr.onload = function() {
    if (xhr.status >= 200 && xhr.status < 300) {
        // Request was successful, handle response
        xhr2.send(formData);
        console.log(xhr.responseText);
        let response = JSON.parse(xhr.responseText);
        if (response['message'] === "Success") {
            alert("Successful");
        } else {
            showError(document.getElementById("user_name"), "duplicated");
        }
    } 
    else {
        if (xhr.status == 400) {
            alert("Duplicated user name")
        }
    }
    };
    xhr.send(formData);
}
});
