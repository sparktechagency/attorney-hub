@extends('frontend.master')

@section('content')
<div class="container my-5 py-5" style="margin-top: 100px !important; margin-bottom: 150px !important;">
    <div class="row justify-content-center">

        <div class="col-md-12 justify-content-center mb-5" style="margin-top: 20px !important;">
            <h3 style="color: black; font-size: 30px;" class="text-center">About NYAbogado  <sup style="color: #4da8da;">TM</sup></h3>
            <p style="color: black;" class="text-center">NYAbogado <sup style="color: #4da8da;">TM</sup> is an attorney marketing network services program, built on a solid foundation that makes the effective and economical building of a law practice much easier. Our network of services is created to deliver of new, geographically local, client referrals to participating General Practice Attorneys and Law Firms.<br>

                <a href="{{ route('home') }}" style="color: #4da8da;">Return to the NYAbogado <sup style="color: #4da8da;">TM</sup> home page.</a></p>
        </div>

        <div class="col-md-12 justify-content-center" style="margin-top: 20px !important;">
          
            <p style="color: black;" class="text-center">NYAbogado <sub style="color: #4da8da;">TM</sub> is very easy to use and available 24 hours a day from the comfort of your home or office.</p>
        </div>

        <div class="col-md-12 justify-content-center mb-5" style="margin-top: 20px !important;">
            <h3 style="color: black; font-size: 30px;" class="text-center">The Greatest Cost</h3>
            <p style="color: black;" class="text-center">The greatest cost of having professional legal help results from not having it when you really should.</p>
        </div>
    </div>
</div>
@endsection