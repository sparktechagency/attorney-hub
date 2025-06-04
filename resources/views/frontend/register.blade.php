@extends('frontend.master')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
       <div class="card-header text-center">
                    <h2>Register</h2>
                          </div>
                <div class="card-body">
                    <!-- Custom styled tabs -->
                    <ul class="nav nav-tabs mb-4" id="registerTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active custom-tab" 
                               id="user-tab" 
                               data-toggle="tab" 
                               href="#user-pane" 
                               role="tab" 
                               aria-controls="user-pane" 
                               aria-selected="true">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom-tab" 
                               id="attorney-tab" 
                               data-toggle="tab" 
                               href="#attorney-pane" 
                               role="tab" 
                               aria-controls="attorney-pane" 
                               aria-selected="false">Attorney</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="registerTabContent">
                        <!-- User Registration Form -->
                        <div class="tab-pane fade show active" id="user-pane" role="tabpanel" aria-labelledby="user-tab">
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label for="user-name">Full Name</label>
                                    <input type="text" name="name" id="user-name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Enter your full name">
                                    @if($errors->has('name'))
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="user-email">Email Address</label>
                                    <input type="email" name="email" id="user-email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter your email">
                                    @if($errors->has('email'))
                                        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="user-password">Password</label>
                                    <input type="password" name="password" id="user-password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Enter your password">
                                    @if($errors->has('password'))
                                        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-4">
                                    <label for="user-password-confirm">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="user-password-confirm" class="form-control" placeholder="Confirm your password">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark w-100">Register as User</button>
                                </div>
                            </form>
                        </div>

                        <!-- Attorney Registration Form -->
                        <div class="tab-pane fade" id="attorney-pane" role="tabpanel" aria-labelledby="attorney-tab">
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label for="attorney-name">Full Name</label>
                                    <input type="text" name="name" id="attorney-name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Enter your full name">
                                    @if($errors->has('name'))
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="attorney-email">Email Address</label>
                                    <input type="email" name="email" id="attorney-email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter your email">
                                    @if($errors->has('email'))
                                        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="license-number">License Number</label>
                                    <input type="text" name="license_number" id="license-number" value="{{ old('license_number') }}" class="form-control @if($errors->has('license_number')) is-invalid @endif" placeholder="Enter your license number">
                                    @if($errors->has('license_number'))
                                        <span class="error invalid-feedback">{{ $errors->first('license_number') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="attorney-password">Password</label>
                                    <input type="password" name="password" id="attorney-password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Enter your password">
                                    @if($errors->has('password'))
                                        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-4">
                                    <label for="attorney-password-confirm">Confirm Password</label>
                                    <input type="password" name="password_confirmation" id="attorney-password-confirm" class="form-control" placeholder="Confirm your password">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-dark w-100">Register as Attorney</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .nav-tabs {
        border-bottom: 1px solid #dee2e6;
    }
    .nav-tabs .nav-link.custom-tab {
        color: #6c757d;
        background-color: #fff;
        border: 1px solid #dee2e6;
        margin-right: 5px;
        padding: 10px 20px;
        border-radius: 4px 4px 0 0;
        transition: all 0.3s ease;
    }

    .nav-tabs .nav-link.custom-tab:hover {
        border-color: #212529;
        color: #212529;
        border-bottom-color: transparent;
    }

    .nav-tabs .nav-link.custom-tab.active {
        color: #fff;
        background-color: #212529;
        border-color: #212529;
        border-bottom-color: transparent;
    }

    .nav-tabs .nav-link.custom-tab.active:hover {
        color: #fff;
    }
</style>
@endsection