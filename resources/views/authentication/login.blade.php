@extends('authentication.layout')
@section('content')
<div class="main">
    @if ($message = Session::get('Message'))
    <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        {{$message}}
    </div>
    @endif
    <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form action="{{route('register')}}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="name" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <input type="password" name="c_password" placeholder="Confirm Password" required="">
                <button>Sign up</button>
            </form>
        </div>

        <div class="login" >
            <form action="{{route('login')}}" method="POST">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="password" placeholder="Password" required="">
                <button>Login</button>
            </form>
        </div>
</div>
