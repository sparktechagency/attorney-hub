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
                    <form id="attorney-register-form" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group mb-3">
                            <label for="attorney_image">Attorney Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="attorney_image" name="attorney_image" accept="image/*">
                                <label class="custom-file-label" for="attorney_image">Choose file</label>
                                <span class="error invalid-feedback" id="attorney_image-error"></span>
                            </div>
                            
                        </div>
                       
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
                            <input type="text" name="zipCode" id="zipCode" class="form-control">
                            <span class="error invalid-feedback" id="zipCode-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control">
                            <span class="error invalid-feedback" id="phone-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="area_of_practice">Area of Practice<span class="text-danger">*</span></label>
                            <select name="area_of_practice[]" id="area_of_practice" class="form-control select2" multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="error invalid-feedback" id="area_of_practice-error" style="display:block;"></span>
                        </div>
                    
                        <div class="form-group mb-3">
                            <label for="state_of_bar_admission_and_court">State of Bar Admission and Court</label>
                            <input type="text" name="state_of_bar_admission_and_court" id="state_of_bar_admission_and_court" class="form-control">
                            <span class="error invalid-feedback" id="state_of_bar_admission_and_court-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="year_of_admission_to_bar">Year of Admission to the Bar</label>
                            <input 
                                type="number" 
                                name="year_of_admission_to_bar" 
                                id="year_of_admission_to_bar" 
                                class="form-control" 
                                min="1900" 
                                max="{{ date('Y') }}" 
                                step="1" 
                                placeholder="YYYY"
                            >
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
                            <span  class="text-purple" style="font-size: 12px;">Must contain at least 5 characters; no spaces</span>
                            <span class="error invalid-feedback" id="login_name-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control">
                            <span  class="text-purple" style="font-size: 12px;">At least 5 characters: no spaces</span>
                            <span class="error invalid-feedback" id="password-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                            <span class="error invalid-feedback" id="password_confirmation-error"></span>
                        </div>
                        <div class="form-group form-check mb-3">
                            <input type="checkbox" name="free_trial" id="free_trial" class="form-check-input">
                            <label class="form-check-label" for="free_trial">90 Day Free Trial!</label>
                           
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
        console.log(formData);
        
        $('.error').text('');
        $('.custom-file, .form-control').removeClass('is-invalid');
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
                    toastr.success(data.message); 
                    setTimeout(function(){
                    window.location.href = '{{ route('home') }}'; 
                    }, 2000);
                } else {
                    toastr.error('Registration failed!');
                }
            },
            error: function(xhr) {
                if(xhr.responseJSON && xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors;
                    for (let field in errors) {
                        var $input = $(`[name="${field}"]`);
                        $input.addClass('is-invalid');
                        $(`#${field}-error`).text(errors[field][0]);
                        // If it's a select2 field, add is-invalid to the select2 container
                        if ($input.hasClass('select2')) {
                            $input.next('.select2-container').find('.select2-selection').addClass('is-invalid');
                        }
                        // If it's a file input, add is-invalid to the custom-file wrapper
                        if ($input.attr('type') === 'file') {
                            $input.closest('.custom-file').addClass('is-invalid');
                        }
                    }
                } else {
                    toastr.error('An unexpected error occurred!');
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#area_of_practice').select2({
            placeholder: "Select Area(s) of Practice",
            allowClear: true,
            multiple: true
        });
    });
    </script>

<script>
    $(function() {
        $('.yearpicker').datepicker({
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy',
            onClose: function(dateText, inst) { 
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).val(year);
            }
        });
    
        $(".yearpicker").focus(function () {
            $(".ui-datepicker-month").hide();
            $(".ui-datepicker-calendar").hide();
        });
    });
    </script>
    <script>
       $(document).ready(function () {
    $('#attorney_image').on('change', function () {
        // Update file label
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);

        // Image preview
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#attorney_image_preview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('#attorney_image_preview').hide();
        }
    });
});
    </script>

<script>
$('#test-error-btn').on('click', function() {
    $('#area_of_practice-error').text('Test error message').show();
    $('#area_of_practice').addClass('is-invalid');
    $('#area_of_practice').next('.select2-container').find('.select2-selection').addClass('is-invalid');
});
</script>

@endsection
