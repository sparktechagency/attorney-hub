@extends('frontend.master')

@section('content')
<div class="our_loyers">
    <div class="container">
            <div class="row">
                    <div class="col-xl-12" style="margin-top: 50px !important; margin-bottom: 30px !important;">
                        <div class="section_title text-center mb-60">
                            <h3> Make a Payment</h3>
                            <p>Remember: The greatest cost of having professional legal help results from not having it when you really should.</p>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12 mb-4 text-align-items-center">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 style="font-weight: bold; text-align: center; margin-bottom: 20px;">Subscription Price List:</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p style="text-align: center; position: relative;">1 Year Subscription - $99.99 <span style="font-weight: bold;"><badge style="color: #4da8da;  text-decoration: none; position: absolute; top: -3px; right: 401px; font-size: 9px;">Active</badge></span></p> 
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <p style="font-weight: bold; text-align: center;">2 Years Subscription - $189.99</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p style="font-weight: bold; text-align: center;">3 Years Subscription - $279.99</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p style="font-weight: bold; text-align: center;">4 Years Subscription - $369.99</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <p style="font-weight: bold; text-align: center;">4 Years Subscription - $459.99</p>
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>

                        <div class="style1" style="text-align: center; margin: 0 auto; display: flex; justify-content: center; align-items: center;">
                            <form action="{{ route('make.payment') }}" method="GET">
                                <div class="style1">
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="5425654">
                                <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="row justify-content-center">
        </div>
    </div>
</div>
@endsection