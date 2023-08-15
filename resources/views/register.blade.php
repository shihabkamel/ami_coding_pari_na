<body style="background-color: rgba(13, 84, 118, 0.257)">
@include('nav')
<h3>Registration</h3> <br>
<form action="{{ route('register_submit') }}" method="post">
    @csrf
    <div>
        name:
    </div>
    <div>
        <input type="text" name="name">
    </div>    
<div>
    Email:
</div>
<div>
    <input type="email" name="email">
</div>
<div>
    Password:
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
    <input type="submit" value="Register">
</div>
</form>
</body>