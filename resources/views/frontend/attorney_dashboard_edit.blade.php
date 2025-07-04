@extends('frontend.master')

@section('content')
<div class="container my-5 py-5">
    <div class="row justify-content-center">

        <div class="col-md-12 justify-content-center mb-5">
            
        </div>
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow border-0">
                        <div class="card-header bg-white text-center border-0 pb-0">
                            <h2 class="mb-0">Update Your Attorney Profile</h2>
                        </div>
                        <div class="card-body py-4 px-4">
                            <div class="row align-items-center">
                                <!-- Profile Image -->
                                <div class="col-4 d-flex justify-content-center">
                                    @if($user->image)
                                        <img src="{{ asset('media/attorney/'.$user->image) }}" alt="Attorney Image" class="img-fluid shadow" style="width: 90px; height: 90px; border-radius: 50%; object-fit: cover; border: 3px solid #e3e6f0;">
                                    @else
                                        <div style="width: 90px; height: 90px; border-radius: 50%; background: #f0f2f5; display: flex; align-items: center; justify-content: center; border: 3px solid #e3e6f0;">
                                            <i class="fas fa-user" style="font-size: 40px; color: #b0b3b8;"></i>
                                        </div>
                                    @endif
                                </div>
                                <!-- Profile Info and Actions -->
                                <div class="col-8">
                                    @if(!empty($user->name))
                                        <div class="mb-1" style="font-size: 1.1rem; font-weight: 500; color: #222;">{{ $user->name }}</div>
                                    @endif
                                    <div class="mb-3" style="font-size: 0.98rem; color: #6c757d;">Attorney Account</div>
                                    <div class="d-flex flex-row justify-content-start align-items-center gap-2 mt-2">
                                        <a href="#" class="btn btn-outline-primary btn-sm px-4 py-2 mr-2 profile-action-btn">Edit Profile</a>
                                        <a href="#" class="btn btn-outline-primary btn-sm px-4 py-2 profile-action-btn">Change Password</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header text-center">
                    <h2>Attorney Profile</h2>
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
                            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name', $user->company_name) }}">
                            <span class="error invalid-feedback" id="company_name-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address1">Address1<span class="text-danger">*</span></label>
                            <input type="text" name="address1" id="address1" class="form-control" value="{{ old('address1', $user->address1) }}">
                            <span class="error invalid-feedback" id="address1-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="address2">Address2</label>
                            <input type="text" name="address2" id="address2" class="form-control" value="{{ old('address2', $user->address2) }}">
                            <span class="error invalid-feedback" id="address2-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="city">City<span class="text-danger">*</span></label>
                            <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $user->city) }}">
                            <span class="error invalid-feedback" id="city-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="state">State/Province<span class="text-danger">*</span></label>
                            <input type="text" name="state" id="state" class="form-control" value="{{ old('state', $user->state) }}">
                            <span class="error invalid-feedback" id="state-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="zip">Zip/Postal Code<span class="text-danger">*</span></label>
                            <input type="text" name="zipCode" id="zipCode" class="form-control" value="{{ old('zipCode', $user->zip) }}">
                            <span class="error invalid-feedback" id="zipCode-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Phone<span class="text-danger">*</span></label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $user->mobile) }}">
                            <span class="error invalid-feedback" id="phone-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="area_of_practice">Area of Practice<span class="text-danger">*</span></label>

                                @php
                                $oldAreas = old('area_of_practice');
                                if ($oldAreas !== null) {
                                    // If it's a string (JSON), decode it
                                    if (is_string($oldAreas)) {
                                        $decoded = json_decode($oldAreas, true);
                                        $selectedAreas = collect(is_array($decoded) ? $decoded : [$oldAreas]);
                                    } else {
                                        $selectedAreas = collect($oldAreas);
                                    }
                                } elseif (isset($user->categories)) {
                                    // If it's a relationship
                                    $selectedAreas = $user->categories->pluck('id');
                                } elseif (isset($user->area_of_practice)) {
                                    if (is_array($user->area_of_practice)) {
                                        $selectedAreas = collect($user->area_of_practice);
                                    } elseif (is_string($user->area_of_practice)) {
                                        $decoded = json_decode($user->area_of_practice, true);
                                        if (is_array($decoded)) {
                                            $selectedAreas = collect($decoded);
                                        } else {
                                            $selectedAreas = collect(explode(',', $user->area_of_practice));
                                        }
                                    } else {
                                        $selectedAreas = collect([]);
                                    }
                                } else {
                                    $selectedAreas = collect([]);
                                }
                            @endphp
                            <select name="area_of_practice[]" id="area_of_practice" class="form-control select2" multiple>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $selectedAreas->contains($category->id) ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="error invalid-feedback" id="area_of_practice-error" style="display:block;"></span>
                        </div>
                    
                        <div class="form-group mb-3">
                            <label for="state_of_bar_admission_and_court">State of Bar Admission and Court</label>
                            <input type="text" name="state_of_bar_admission_and_court" id="state_of_bar_admission_and_court" class="form-control" value="{{ old('state_of_bar_admission_and_court', $user->state_of_bar_admission_and_court) }}">
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
                                value="{{ old('year_of_admission_to_bar', $user->year_of_admission_to_bar) }}"
                            >
                            <span class="error invalid-feedback" id="year_of_admission_to_bar-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">E-Mail<span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                            <span class="error invalid-feedback" id="email-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="website">Web Site</label>
                            <input type="text" name="website" id="website" class="form-control" value="{{ old('website', $user->website) }}">
                            <span class="error invalid-feedback" id="website-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="login_name">Login Name<span class="text-danger">*</span></label>
                            <input type="text" name="login_name" id="login_name" class="form-control" value="{{ old('login_name', $user->login_name) }}">
                            <span  class="text-purple" style="font-size: 12px;">Must contain at least 5 characters; no spaces</span>
                            <span class="error invalid-feedback" id="login_name-error"></span>
                        </div>
                        {{-- <div class="form-group mb-3">
                            <label for="password">Password<span class="text-danger">*</span></label>
                            <input type="password" name="password" id="password" class="form-control" value="">
                            <span  class="text-purple" style="font-size: 12px;">At least 5 characters: no spaces</span>
                            <span class="error invalid-feedback" id="password-error"></span>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Confirm Password<span class="text-danger">*</span></label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" value="">
                            <span class="error invalid-feedback" id="password_confirmation-error"></span>
                        </div> --}}
                        <div class="form-group form-check mb-3">
                            <input type="checkbox" name="free_trial" id="free_trial" class="form-check-input" {{ old('free_trial', $user->free_trial) ? 'checked' : '' }}>
                            <label class="form-check-label" for="free_trial">90 Day Free Trial!</label>
                           
                        </div>
                        <div class="form-group">
                            <button type="button" id="attorney-register-btn" class="btn w-100" style="background-color: #4da8da; color: #fff; border: none;">Update Profile</button>
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
    .profile-action-btn {
        min-width: 140px;
        font-weight: 500;
        border-radius: 20px;
        color: #4da8da !important;
        border-color: #4da8da !important;
        background: #fff !important;
        transition: background 0.2s, color 0.2s;
    }
    .profile-action-btn:hover, .profile-action-btn:focus {
        background: #4da8da !important;
        color: #fff !important;
        border-color: #4da8da !important;
        text-decoration: none;
    }
</style>
@endsection