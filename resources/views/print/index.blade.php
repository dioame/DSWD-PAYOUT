@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Default</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Default</li>
@endsection

@section('content')
<div class="container-fluid">
    <a href="/print/generate-pdf" class="btn btn-primary">Generate PDF</a>
    <hr>

   
    <div class="row">

   


        <div class="col-lg-6 col-md-6">
      <!--  -->
      <div class="card">
        <div class="card-header">
        <h5>Latest Capture</h5>
        </div>
        <div class="card-body">


        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
            <th scope="col">Payroll #</th>
            <th scope="col">Captured at</th>
            <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
                
           
            @foreach($latest as $row)
                <tr>
                    <th scope="row">{{ $row->payroll_no }}</th>
                    <td>{{ $row->captured_at }}</td>
                    <td>
                        <div style='width:30px;'>
                        <a href="{{ asset('storage/pictures/' . basename($row->path)) }}" target=_blank><img src="{{ asset('storage/pictures/' . basename($row->path)) }}" alt="" style='max-width:100%;max-height:100%;border-radius:50px;'></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            </div>
        </div>
    </div>
        </div>
      
      <!--  -->
 

        <div class="col-lg-6 col-md-6">
            
        <div class="card">
        <div class="card-header">
        <h5>Duplicate Capture</h5>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
            <th scope="col">Payroll #</th>
            <th scope="col">Captured at</th>
            <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
            @foreach($duplicate as $row)
                <tr>
                    <th scope="row">{{ $row->payroll_no }}</th>
                    <td>{{ $row->captured_at }}</td>
                    <td>
                        <div style='width:30px;'>
                        <a href="{{ asset('storage/pictures/' . basename($row->path)) }}" target=_blank><img src="{{ asset('storage/pictures/' . basename($row->path)) }}" alt="" style='max-width:100%;max-height:100%;border-radius:50px;'></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
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


