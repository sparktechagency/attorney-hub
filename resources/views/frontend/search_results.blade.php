@extends('frontend.master')

@section('content')
{{-- @dd($attorneys) --}}
<div class="our_loyers">
    <div class="container">
            <div class="row">
                    <div class="col-xl-12">
                        <div class="section_title text-center mb-60">
                            <h3>Our Lawyers</h3>
                            <p>Many variations of passages of Lorem Ipsum available, but the majority have <br> suffered alteration in some.</p>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12 mb-4">
                                @php
                                    // Convert to JSON for form input only
                                    $attorneysJson = is_array($attorneys) ? json_encode($attorneys) : $attorneys;
                                @endphp
                                <form action="{{ route('filter.attorney') }}" method="GET" id="searchForm" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="attorneys" value="{{ $attorneysJson }}">
                                    <div class="row align-items-end">
                                        <!-- Sort By -->
                                        <div class="col-md-3">
                                            <label for="sort_by" class="form-label">Sort By</label>
                                            <select name="sort_by" id="sort_by" class="form-control">
                                                <option value="">Select</option>
                                                <option value="company_name">Company Name</option>
                                                <option value="city">City</option>
                                                <option value="state">State</option>
                                            </select>
                                        </div>
                                        <!-- Order -->
                                        <div class="col-md-3">
                                            <label for="order" class="form-label">Order</label>
                                            <select name="order" id="order" class="form-control">
                                                <option value="">Select</option>
                                                <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                                                <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Descending</option>
                                            </select>
                                        </div>
                                        <!-- Keyword -->
                                        <div class="col-md-4">
                                            <label for="keyword" class="form-label">Keyword</label>
                                            <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Keyword">
                                        </div>
                                        <!-- Submit -->
                                        <div class="col-md-2">
                                            <button type="submit" style="background-color: #4da8da; color: #ffffff;" class="btn w-100">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="row justify-content-center">
            {{-- @foreach($attorneys as $attorney)
            <div class="col-xl-4 col-md-4 col-lg-4 col-sm-6">
                <div class="card mb-4 attorney fixed-height-card">
                    <img src="{{ $attorney->image ? asset('media/attorney/'.$attorney->image) : asset('media/attorney/No_Image.jpg') }}" class="card-img-top" style="height: 210px;" alt="Lawyer Image">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{ $attorney->name ?? '' }}</h5>
                        <h4 style="font-weight: bold;">Family Lawyer</b></h4>
                        <P><span style="font-weight: bold">Address1 :</span> {{ $attorney->address1 ?? '' }}</P>
                        <P><span style="font-weight: bold">Address2 :</span> {{ $attorney->address2 ?? '' }}</P>
                        <P><span style="font-weight: bold">City :</span> {{ $attorney->city ?? '' }}</P>
                        <P><span style="font-weight: bold">State :</span> {{ $attorney->state ?? '' }}</P>
                        <P><span style="font-weight: bold">Zip :</span> {{ $attorney->zip ?? '' }}</P>
                        <P><span style="font-weight: bold">Phone :</span> {{ $attorney->phone ?? '' }}</P>
                        <P><span style="font-weight: bold">Email :</span> {{ $attorney->email ?? '' }}</P>
                        <P><span style="font-weight: bold">Website :</span> {{ $attorney->website ?? '' }}</P>
                        <P><span style="font-weight: bold">State of Bar Admission and Court :</span> {{ $attorney->state_of_bar_admission_and_court ?? '' }}</P>
                        <P><span style="font-weight: bold">Year of Admission to Bar :</span> {{ $attorney->year_of_admission_to_bar ?? '' }}</P>
                        
                       
                    </div>
                </div>
            </div>
            @endforeach --}}

            {{-- <div class="col-12 text-center mt-5">
                <button class="btn btn-dark px-5 py-2">Load More</button>
            </div> --}}
            
            
                @foreach($attorneys as $attorney)
                <div class="col-xl-4 col-md-4 col-lg-4 col-sm-6">
                    <div class="card mb-4 attorney fixed-height-card" style=" background-color: #4da8da; border-radius: 10px; box-shadow: 0 0 10px 0 rgba(218, 200, 200, 0.1);">
                        <div class="card-body">
                            <div class="row " style="margin-left: 0px;">
                                <div class="col-md-4"  style="overflow: hidden; border: 3px solid #eee; border-radius: 100%; height: 112px; width:110px; align-items: center; justify-content: center; margin: auto;">
                                    <img src="{{ isset($attorney['image']) && $attorney['image'] ? asset('media/attorney/'.$attorney['image']) : asset('media/attorney/No_Image.jpg') }}" class="card-img-top" style="height: 100%; width: 100%; object-fit: cover; overflow: visible;" alt="Lawyer Image">
                                </div>
                                <div class="col-md-8 " style="align-items: center; justify-content: center; margin: auto;">
                                    <h5 class="card-title mb-2" style="margin: auto; color: #ffffff;"> {{ $attorney['name'] ?? '' }}</h5>
                                    <h6 style="color: #ffffff;">
                                        @php
                                            $areaNames = [];
                                            $areaIds = is_array($attorney['area_of_practice'])
                                                ? $attorney['area_of_practice']
                                                : json_decode($attorney['area_of_practice'], true);
                                    
                                            if (is_array($areaIds)) {
                                                foreach($areaIds as $areaId) {
                                                    $category = \App\Models\Category::find($areaId);
                                                    if ($category) {
                                                        $areaNames[] = $category->name;
                                                    }
                                                }
                                            }
                                        @endphp
                                        {{ implode(', ', $areaNames) }}
                                    </h6>
                                    </h4>
                                    <P><span style="font-weight: bold"></span> {{ $attorney['mobile'] ?? '' }}</P>
                                    
                                </div>
                            </div>
                            <hr style="border: 1px solid #ffffff;">
                            
                            <P><span>Address1 :</span> {{ $attorney['address1'] ?? '' }}</P>
                            <P><span>Address2 :</span> {{ $attorney['address2'] ?? '' }}</P>
                            <P><span>City :</span> {{ $attorney['city'] ?? '' }}</P>
                            <P><span>State :</span> {{ $attorney['state'] ?? '' }}</P>
                            <P><span>Zip :</span> {{ $attorney['zip'] ?? '' }}</P>
                            <P><span>Email :</span> {{ $attorney['email'] ?? '' }}</P>
                            <P><span>Company Name :</span> {{ $attorney['company_name'] ?? '' }}</P>
                           
                            <P><span>Website :</span> {{ $attorney['website'] ?? '' }}</P>
                            <P><span>State of Bar Admission and Court :</span> {{ $attorney['state_of_bar_admission_and_court'] ?? '' }}</P>
                            <P><span>Year of Admission to Bar :</span> {{ $attorney['year_of_admission_to_bar'] ?? '' }}</P>
                            
                           
                        </div>
                    </div>
                </div>
                @endforeach
            

        
        </div>
    </div>
</div>
@endsection