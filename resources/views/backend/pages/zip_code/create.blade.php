
@extends('backend')

@section('page_level_css_plugins')

@endsection

@section('page_level_css_files')

@endsection

@section('content')
<section class="content">

    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{ $commons['content_title'] }}</h1>

            <div class="card-tools">
                Note::
            </div>
        </div>
        <form action="{{route('storeZipCode')}}" method="post" data-bitwarden-watching="1" enctype="multipart/form-data" accept-charset="UTF-8">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" name="city" class="form-control @if($errors->has('city')) is-invalid @endif" placeholder="Enter City Name" value="{{ old('city') }}">
                            @if($errors->has('city'))
                                <span class="error invalid-feedback">{!! $errors->first('city') !!}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Zip Code</label>
                            <input type="text" name="zipCode" class="form-control @if($errors->has('zipCode')) is-invalid @endif"  placeholder="Enter Zip Code" value="{{ old('zipCode') }}">
                            @if($errors->has('zipCode'))
                                <span class="error invalid-feedback">{!! $errors->first('zipCode') !!}</span>
                            @endif
                        </div>
                    </div>
                </div>


            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


    {{-- @section('content')
        @include('backend.pages.zip_code._table')
        @include('backend.pages.department._table')
    @endsection --}}

    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Zip Code List</h1>
            <div class="card-tools">
                Note::Zip Code List
            </div>
        </div>

        <div class="card-body p-0">
            <table class="table table-responsive-md table-responsive-lg table-responsive-sm text-center">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>City</th>
                        <th>Zip Code</th>
                        

                        @include('backend.pages.commons.timestamps_th')
                        <th class="custom_actions">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($areas as $row)
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>{{ $row->city }}</td>
                            <td>{{ $row->zipCode }}</td>
    
    
                            @include('backend.pages.commons.timestamps_td')

                            <td class="custom_actions">
                                <div class="btn-group">
                                    {{-- <a href="" class="btn btn-flat btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                        <i class="far fa-eye"></i>
                                    </a> --}}
                                    <a href="{{ route('department.edit',$row->id) }}" class="btn btn-flat btn-outline-info btn-sm" data-toggle="tooltip" title="Edit">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <form method="post" class="list_delete_form" action="" accept-charset="UTF-8" >
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button onclick="return confirm('Are you sure?')" type="submit" class="btn btn-flat btn-outline-danger btn-sm" data-toggle="tooltip" title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
    
                            
                        </tr>
                    @endforeach
                    </tbody>
            </table>
        </div>

        <div class="card-footer">
            {{ $areas->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
    </div>  
</section>
@endsection


<!-- BEGIN PAGE LEVEL PLUGINS -->
@section('page_level_js_plugins')

@endsection
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
@section('page_level_js_scripts')

@endsection



