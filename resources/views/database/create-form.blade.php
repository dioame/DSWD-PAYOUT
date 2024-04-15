
@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Store Database</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Store Database</li>
@endsection

@section('content')




<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
        
                <div class="card">
                    <div class="card-header">
                        <h5>Add Database</h5>
                        <p>Please do not use [space]. sample valid format <br> 
                            <b>1. dswdpayouttest</b><br>
                            <b>2. dswd-payout-test</b><br>
                            <b>3. dswd_payout_test</b>
                        </p>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('database.store') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <label for="">Database Name</label><br>
                          <input class="form-control" type="text" name="database_name" value="dswd-" placeholder="Database Name" required><br>
                         <button type="submit" class="btn btn-primary">Save</button>
                      </form>
                    </div>
                </div>

        </div>
    </div>

</div>


    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';


    </script>
@endsection


@section('script')

@endsection







