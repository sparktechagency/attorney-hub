@extends('frontend.master')

<style>
    /* Custom tooltip styles */
    .tooltip {
        --bs-tooltip-max-width: 900px; /* Increased width for longer descriptions */
    }
    .tooltip-inner {
        max-width: 100%;
        font-size: 17px; /* Increased font size */
        padding: 12px 16px;
    }
</style>

@section('content')
    <!-- slider_area_start -->
    <div class="slider_area ">
        <div class="slider_area_inner d-flex align-items-center" style="background-image: url(img/banner/new_banner.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7">
                        <div class="single_slider">
                            <div class="slider_text">
                                <h3>High Quality Law <br>
                                    Advice and Support</h3>
                                <p>Find lawyer in your city</p>
                              
                                <form action="{{ route('search.attorney') }}" method="get" class="newsletter_form">
                                    @csrf
                                    <div class="col-xl-8 col-lg-8 col-md-8 d-flex align-items-center">
                                        <input class="form-control @if($errors->has('zip_code')) is-invalid @endif" 
                                               type="text" 
                                               name="zip_code" 
                                               placeholder="Enter your zip code" 
                                               style="border-top-right-radius: 0; border-bottom-right-radius: 0; margin-right: 0;" 
                                               value="{{ old('zip_code') }}">
                                        <button type="submit" style="background-color: rgb(242,198,77); color: white; border: none; padding: 8px 20px; cursor: pointer; border-radius: 0 5px 5px 0; width: 120px; height: 38px;">Search</button>
                                    </div>
                                    @if($errors->has('zip_code'))
                                        <span class="text-danger" style="padding: 8px 20px;">{{ $errors->first('zip_code') }}</span>
                                    @endif
                                </form>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider_area_end -->

    <!-- about_area _start  -->
    <div class="about_area">
        <div class="opacity_icon d-none d-lg-block">
            <i class="flaticon-balance"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="single_about_info text-center py-4 py-md-5">
                        <h1 class="attorney_heading fs-4 fs-md-2 mb-3">Are you an attorney?</h1>
                        <p class="mb-3">
                            Attorneys and law firms wishing to expand their client base may wish to consider joining our attorney marketing network.
                        </p>
                        <a href="{{ route('get.register') }}"
                           class="btn"
                           style="background-color: rgb(242,198,77); color: white; border: none; text-decoration: none; font-weight: 500;">
                            Join NYAbogado
                            <sub style="font-size: 0.5em; color: #ffffff; font-weight: normal;">TM</sub>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area _end -->


    <!-- about_area _start  -->
    <div class="about_area_1">
        {{-- <div class="opacity_icon d-none d-lg-block">
            <i class="flaticon-balance"></i>
        </div> --}}
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="single_about_info text-center">
                        <h3>Free Referral Service<br>
                        Free Call<br>
                        Free Initial Consultation</h3>
                        <p>We enable people and/or businesses needing legal services to match their needs with a selection of licensed top law professionals in their local geographical areas. Users save time and money in their search for local attorneys that practice in many different areas of professional practice.</p>
                        <p><b>NYAbogado</b> <sup style="font-size: 0.5em; color: #ffffff; font-weight: normal;">TM</sup> is very easy to use and available 24 hours a day from the comfort of your home or office.</p>
  
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="single_about_info text-center">
                        <h3>Spanish Speaking <br>Legal Services:</h3>
                        <p>Personal Injury, Criminal Defense, Divorce, Matrimonial, Custody, Immigration, Real Estate, Commercial, Bankruptcy, Estates, Trusts, Wills, Civil Litigations, Landlord and Tenant Disputes</p>
                        <h3>The Greatest Cost</h3>
                        <p>The greatest cost of having professional legal help results from <b> not having it </b> when you really should.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about_area _end -->

    <!-- practice_area_start -->
    <div class="practice_area">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-12">
                    <div class="section_title text-center mb-4 mb-md-5">
                        <h3>PROFESSIONAL DIRECTORY</h3>
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-8">
                                <p>
                                    <b style="color: black !important;"> Get a good Spanish speaking law firm!</b> Let our free referral service help you find a good abogado or law firm in your local home area. All of our member firms attorneys are licensed, experienced in their particular area of practice, and offer free initial consultations.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($categories as $category)
                <div class="col-12 col-sm-6 col-md-3 col-lg-3 mb-4 d-flex align-items-stretch">
                    <div class="card w-100 category-card" style="color: #4da8da; background-color: #4da8da; border-radius: 10px; transition: all 0.3s ease;"
                         data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $category->short_description ?? '' }}">
                            <a href="{{ route('category.wise.attorney', $category->uuid) }}">
                            <div class="card-body">
                                <h3 class="card-title text-center" style="color: #ffffff; font-size: 30px;">{{ $category->name ?? '' }}</h3>
                                <div class="card-description-wrapper" style="position: relative;">
                                    <p class="card-text card-short" style="color: #e1e1e1; margin-bottom: 0;">
                                        {{ \Illuminate\Support\Str::limit($category->short_description ?? '', 200, '...') }}
                                    </p>
                                    <p class="card-text card-full" style="color: #e1e1e1; margin-bottom: 0; display: none;">
                                        {{ $category->short_description ?? '' }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- practice_area_end -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl, {
                    customClass: 'wide-tooltip' // Optional: additional class for more control
                });
            });
        });
    </script>
        

@endsection 