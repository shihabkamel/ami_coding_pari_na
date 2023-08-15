<body style="background-color: rgba(13, 84, 118, 0.257)">
@include('nav')

<h3>Login</h3> 
<form action="{{ route("login_submit") }}" method="post">
 @csrf   
<div>
    Email:
</div>
<div>
    <input type="email" name="email">
</div>
<div>
    Password
</div>
<div>
    <input type="password" name="password" id="">
</div>
<div>
    <input type="submit" value="Login"> <br>
    <a href="{{ route('forget_password') }}">Forget Password</a>
</div>
</form>
</body>