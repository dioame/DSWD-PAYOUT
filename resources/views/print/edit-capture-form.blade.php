@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Edit Capture Form</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Edit Capture Form</li>
@endsection

@section('content')




<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12 col-md-12">
        
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $capture->payroll ? $capture->payroll->name : '' }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-3">
                                <div style='width:200px;'>
                                    <img src="{{ asset("storage/pictures/" . basename($capture->path)) }}" alt="" style="max-width:100%;">
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                    <form action="{{ route('print.edit-capture',$capture->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                    <label for="">Payroll Number</label>
                                    <input type="text" class="form-control" name="payroll_no" value="{{$capture->payroll_no}}"><br>
                                    <input type="submit" class="btn btn-primary">
                                    </form>
                            </div>
                        </div>
                  
                    
                      
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







