@extends('frontend.master')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5 mb-5"> <!-- Added extra margin to the card -->
                <div class="card-header text-center">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('get.login') }}" method="post">
                        {{ csrf_field() }}

                        <!-- Email Field -->
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter your email">
                            @if($errors->has('email'))
                                <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <!-- Password Field -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Enter your password">
                            @if($errors->has('password'))
                                <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <!-- Remember Me and Submit Button -->
                        <div class="form-group d-flex justify-content-between align-items-center">
                            <div class="form-check">
                                <input type="checkbox" id="remember" name="remember_me" class="form-check-input" @if(old('remember_me')) checked @endif>
                                <label for="remember" class="form-check-label">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-dark">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection