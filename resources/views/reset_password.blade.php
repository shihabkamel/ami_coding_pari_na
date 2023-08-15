<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>reset password</title>
</head>
<body style="background-color: rgba(13, 84, 118, 0.257)">
    

<h2> Reset password</h2>
<form action="{{ route('reset_password_submit') }}" method="post">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="hidden" name="email" value="{{ $email }}">
<div>
   New Password:
</div>
<div>
    <input type="password" name="password" >
</div>
<div>
    Retype Password:
</div>
<div>
    <input type="password" name="password">
</div>
<div>
    <input type="submit" value="Submit">
</div>
</form>

</body>
</html>