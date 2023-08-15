<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>forget password</title>
</head>
<body style="background-color: rgba(13, 84, 118, 0.257)">
    
<div style="text-align: center" >
<form action="{{ route('forget_password_submission') }}" method="post">
    @csrf
    <div>
        Email:
   
        <input type="email" name="email">
    </div>

    <div>
        <input type="submit" value="Submit" style="margin-top: 5px"> <br>
        <a href="{{ route('login') }}">Back to login page</a>
    </div>
    </form>
</div>
</body>
</html>