@extends('layouts.master')

@section('title', 'View Photos')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Trash Capture</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Photos</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        @foreach($captures as $capture)
        <div class="col-lg-6 col-md-6">
        
                <div class="card">
                    <div class="card-header">
                    {{$capture->payroll_no}}
                    </div>
                    <div class="card-body" style="width:300px;">
                            <img src='{{ asset("storage/" . $capture->path)  }}' alt="" style="max-width:100%;">
                     
                    </div>
                </div>

        </div>
        @endforeach
    </div>

</div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
 
@endsection







