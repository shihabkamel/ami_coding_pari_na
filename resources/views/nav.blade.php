<div style="text-align: right">
<a href="{{ route('home') }}">Home</a> - 
@if(auth()->check())
<a href="{{ route('section2') }}">Section 2</a>-
<a href="{{ route('getInputValues') }}">section 3</a> -
<a href="{{ route('logout') }}">Logout</a>
@endif
@if(!auth()->check())
<a href="{{ route('login') }}">Login</a> -
<a href="{{ route('register') }}">Registration</a> 
@endif
</div>
<a href="{{ route('home') }}"><h1 style="text-align: center">Ami coding pari na</h1></a>