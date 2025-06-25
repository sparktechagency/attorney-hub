@extends('frontend.master')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">

        <div class="col-md-12 justify-content-center mb-5">
            <h3 style="color: black; font-size: 30px;" class="text-center">Join The Attorney Marketing Network</h3>
            <p style="color: black;" class="text-center">For more information on how the NYAbogado <sup style="color: #4da8da;">TM</sup> marketing network works, <a href="#" style="color: #4da8da;">Click Here</a>. When you are ready, you can <a href="{{ route('get.register') }}" style="color: #4da8da;">Register</a> for your own exclusive territory. If you have already registered for an account and would like to update your information, <a href="{{ route('get.login') }}" style="color: #4da8da;">Log In Here</a>.<br>

               <a href="{{ route('home') }}" style="color: #4da8da;">Return to the NYAbogado TM home page.</a></p>
        </div>
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header text-center">
                    <h2>Attorney Registration</h2>
                </div>
                <div class="card-body">
                    <form id="attorney-register-form" method="post">
                        {{ csrf_field() }}
                       
                        <div class="form-group mb-3">
                            <label for="company_name">Company Name<span class="text-danger">*</span></label>
                            <input type="text" name="company_name" id="company_name" class="form-control">
                            <span class="error invalid-feedback" id="company_name-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address1">Address1<span class="text-danger">*</span></label>
                            <input type="text" name="address1" id="address1" class="form-control">
                            <span class="error invalid-feedback" id="address1-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address2">Address2</label>
                            <input type="text" name="address2" id="address2" class="form-control">
                            <span class="error invalid-feedback" id="address2-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City<span class="text-danger">*</span></label>
                            <input type="text" name="city" id="city" class="form-control">
                            <span class="error invalid-feedback" id="city-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="state">State/Province<span class="text-danger">*</span></label>
                            <input type="text" name="state" id="state" class="form-control">
                            <span class="error invalid-feedback" id="state-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="zip">Zip/Postal Code<span class="text-danger">*</span></label>
                            <input type="text" name="zip" id="zip" class="form-control">
                            <span class="error invalid-feedback" id="zip-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control">
                            <span class="error invalid-feedback" id="phone-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="area_of_practice">Area of Practice<span class="text-danger">*</span></label>
                            <input type="text" name="area_of_practice" id="area_of_practice" class="form-control">
                            <span class="error invalid-feedback" id="area_of_practice-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="state_of_bar_admission_and_court">State of Bar Admission and Court</label>
                            <input type="text" name="state_of_bar_admission_and_court" id="state_of_bar_admission_and_court" class="form-control">
                            <span class="error invalid-feedback" id="state_of_bar_admission_and_court-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="year_of_admission_to_bar">Year of Admission to the Bar</label>
                            <input type="text" name="year_of_admission_to_bar" id="year_of_admission_to_bar" class="form-control">
                            <span class="error invalid-feedback" id="year_of_admission_to_bar-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">E-Mail<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control">
                            <span class="error invalid-feedback" id="email-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="website">Web Site</label>
                            <input type="text" name="website" id="website" class="form-control">
                            <span class="error invalid-feedback" id="website-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="login_name">Login Name<span class="text-danger">*</span></label>
                            <input type="text" name="login_name" id="login_name" class="form-control">
                            <span class="error invalid-feedback" id="login_name-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control">
                            <span class="error invalid-feedback" id="password-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="confirm_password">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                            <span class="error invalid-feedback" id="confirm_password-error"></span>
                        </div>
                        <div class="form-group form-check mb-3">
                            <input type="checkbox" name="free_trial" id="free_trial" class="form-check-input">
                            <label class="form-check-label" for="free_trial">90 Day Free Trial!</label>
                            <span class="error invalid-feedback" id="free_trial-error"></span>
                        </div>
                        <div class="form-group">
                            <button type="button" id="attorney-register-btn" class="btn w-100" style="background-color: #4da8da; color: #fff; border: none;">Register as Attorney</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Attorney registration form submission
    $('#attorney-register-btn').on('click', function(e) {
        e.preventDefault();
        var formData = new FormData($('#attorney-register-form')[0]);
        // Clear previous errors
        $('.error').text('');
        $('.form-control').removeClass('is-invalid');
        $.ajax({
            type: 'POST',
            url: '{{ route('post.register') }}',
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.success) {
                    alert('Registration successful!');
                }
            },
            error: function(xhr) {
                const errors = xhr.responseJSON.errors;
                for (let field in errors) {
                    $(`[name="${field}"]`).addClass('is-invalid');
                    $(`#${field}-error`).text(errors[field][0]);
                }
            }
        });
    });
</script>
@endsection
