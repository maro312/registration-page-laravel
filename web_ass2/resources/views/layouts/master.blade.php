<!DOCTYPE html>
<html lang="ar" dir ="rlt">

<head>
    <meta http-equiv="Content-Type" content = 'text/html;charset=UTF-8'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Registration Form</title>
    

</head>
<body>
    <header> 
        <h3>{{__('messages.header')}}</h3>
        <style>
            header {
                text-align: center;
                padding: 4px;
                background-color: #007bff;
                color: white;
                margin-bottom: 8px;
            }
        </style>
    </header>

    @yield('content');

    <footer>
        <h3>{{__('messages.footer')}}</h3>
        <style>
            footer {
                text-align: center;
                padding: 4px;
                background-color: #007bff;
                color: white;
                margin-top: 8px;
            }
        </style>
    </footer>

</body>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">  </script>
<script src = 'js/API_Ops.js'></script>
<script scr = "js/app.js">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>