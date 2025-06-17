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
                            <form action="#" method="post">
                                {{ csrf_field() }}

                                <input type="hidden" name="role" value="user">

                                <div class="form-group mb-3">
                                    <label for="user-name">Full Name</label>
                                    <input type="text" name="" id="user-name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Enter your full name">
                                    {{-- @if($errors->has('name'))
                                        <span class="error invalid-feedback">{{ $errors->first('name') }}</span>
                                    @endif --}}
                                </div>

                                <div class="form-group mb-3">
                                    <label for="user-email">Email Address</label>
                                    <input type="email" name="" id="user-email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter your email">
                                    {{-- @if($errors->has('email'))
                                        <span class="error invalid-feedback">{{ $errors->first('email') }}</span>
                                    @endif --}}
                                </div>

                                <div class="form-group mb-3">
                                    <label for="user-password">Password</label>
                                    <input type="password" name="" id="user-password" class="form-control @if($errors->has('password')) is-invalid @endif" placeholder="Enter your password">
                                    {{-- @if($errors->has('password'))
                                        <span class="error invalid-feedback">{{ $errors->first('password') }}</span>
                                    @endif --}}
                                </div>

                                <div class="form-group mb-4">
                                    <label for="user-password-confirm">Confirm Password</label>
                                    <input type="password" name="" id="user-password-confirm" class="form-control" placeholder="Confirm your password">
                                </div>

                                <div class="form-group">
                                    <button type="button" id="user-register-btn" class="btn btn-dark w-100">Register as User</button>
                                </div>
                            </form>
                        </div>

                        <!-- Attorney Registration Form -->
                        <div class="tab-pane fade" id="attorney-pane" role="tabpanel" aria-labelledby="attorney-tab">
                            <form id="attorney-register-form" method="post">
                                {{ csrf_field() }}
                        
                                <input type="hidden" name="role" value="attorny">
                        
                                <div class="form-group mb-3">
                                    <label for="attorney-name">Full Name</label>
                                    <input type="text" name="name" id="attorney-name" value="{{ old('name') }}" class="form-control @if($errors->has('name')) is-invalid @endif" placeholder="Enter your full name">
                                    <span class="error invalid-feedback" id="name-error"></span>
                                </div>
                        
                                <div class="form-group mb-3">
                                    <label for="attorney-email">Email Address</label>
                                    <input type="email" name="email" id="attorney-email" value="{{ old('email') }}" class="form-control @if($errors->has('email')) is-invalid @endif" placeholder="Enter your email">
                                    <span class="error invalid-feedback" id="email-error"></span>
                                </div>
                        
                                <div class="form-group mb-3">
                                    <label for="attorney-zip">Select Zip</label>
                                    <select name="zipCode" id="attorney-zip" class="form-control">
                                        <option value="">Select Zip</option>
                                        @foreach($areas as $area)
                                            <option value="{{ $area->zipCode }}" {{ old('zipCode') == $area->zipCode ? 'selected' : '' }}>{{ $area->zipCode }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error invalid-feedback" id="zip-error"></span>
                                </div>
                        
                                <div class="form-group mb-3">
                                    <label for="attorney-category">Select Category</label>
                                    <select name="category_id" id="attorney-category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error invalid-feedback" id="category-error"></span>
                                </div>
                        
                                <div class="form-group mb-3">
                                    <label for="license-number">License Number</label>
                                    <input type="text" name="license_number" id="license-number" value="{{ old('license_number') }}" class="form-control" placeholder="Enter your license number">
                                    <span class="error invalid-feedback" id="license-number-error"></span>
                                </div>
                        
                                <div class="form-group mb-3">
                                    <label for="attorney-password">Password</label>
                                    <input type="password" name="password" id="attorney-password" class="form-control" placeholder="Enter your password">
                                    <span class="error invalid-feedback" id="password-error"></span>
                                </div>
                        
                                <div class="form-group mb-4">
                                    <label for="attorney-password-confirm">Confirm Password</label>
                                    <input type="password" name="confirm_password" id="attorney-password-confirm" class="form-control" placeholder="Confirm your password">
                                    <span class="error invalid-feedback" id="confirm-password-error"></span>
                                </div>
                        
                                <div class="form-group">
                                    <button type="button" id="attorney-register-btn" class="btn btn-dark w-100">Register as Attorney</button>
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


@section('scripts')

<script>
   

    // User registration form submission
    $('#user-register-btn').on('click', function(e) {
        e.preventDefault();
        
        const formData = new FormData($('#user-register-form')[0]);
        
        $.ajax({
            url: '',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            success: function(data) {
                if (data.errors) {
                    // Clear previous error messages
                    $('.error').text('');
                    $('.form-control').removeClass('is-invalid');
                    
                    // Display validation errors
                    $.each(data.errors, function(key, value) {
                        const inputField = $(`[name="${key}"]`);
                        const errorSpan = $(`#${key}-error`);
                        
                        if (errorSpan.length) {
                            errorSpan.text(value[0]);
                            inputField.addClass('is-invalid');
                        } else {
                            inputField.addClass('is-invalid');
                            inputField.after(`<span class="error-message text-danger">${value[0]}</span>`);
                        }
                    });
                } else if (data.success) {
                    alert('Registration successful!');
                    window.location.href = data.redirect_url;
                }
            },
            error: function(xhr) {
                console.error('Error:', xhr.responseText);
                alert('An error occurred. Please try again.');
            }
        });
    });

    // Attorney registration form submission
    $('#attorney-register-btn').on('click', function(e) {
    e.preventDefault();
    console.log('Attorney register button clicked');
    var formData = new FormData(document.getElementById('attorney-register-form'));
    
    // Clear previous errors
    $('.error').text('');
    $('.form-control').removeClass('is-invalid');
    
    // Get the form data
    const form = $('#attorney-register-form')[0];
    const formData = new FormData(form);
    console.log(formData);
    
    $.ajax({
        url: '{{ route("post.register") }}',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            if (response.success) {
                alert('Registration successful!');
                window.location.href = '/login';
            }
        },
        error: function(xhr) {
            console.log(data);
            if (xhr.status === 422) {
                // Validation errors
                const errors = xhr.responseJSON.errors;
                $.each(errors, function(key, value) {
                    const errorElement = $(`#${key}-error`);
                    if (errorElement.length) {
                        errorElement.text(value[0]);
                        $(`[name="${key}"]`).addClass('is-invalid');
                    }
                });
            } else {
                console.error('Error:', xhr.responseText);
                alert('An error occurred. Please try again.');
            }
        }
    });
});
    // User register button click
    $('#user-register-btn').on('click', function(e) {
        e.preventDefault();
        console.log('User register button clicked');
        // $(this).closest('form').submit();
    });
</script>
@endsection
