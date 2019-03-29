@extends('layouts.auth')

@section('content')
    <div class="login-form">

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email Address</label>
                <input class="au-input au-input--full" type="email" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
            </div>
            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
        </form>
        <div class="register-link">
            <p>
                You don't have an account?
            </p>
        </div>
    </div>
@endsection