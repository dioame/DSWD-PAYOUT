@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Not Yet Capture</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Not Yet Capture</li>
    <li class="breadcrumb-item active">Default</li>
@endsection

@section('content')
<div class="container-fluid">

   
    <div class="row">

   

      
      <!--  -->
 

        <div class="col-lg-12 col-md-12">
            
        <div class="card">
        <div class="card-header">
        <h5>Not Yet Capture List</h5>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
            <th scope="col">Payroll #</th>
            <th scope="col">Name</th>
            <th scope="col">Barangay</th>
            <th scope="col">Municipality</th>
            </tr>
            </thead>
            <tbody>
            @foreach($nyCapture as $row)
                <tr>
                    <th scope="row">{{ $row->payroll_no }}</th>
                    <th scope="row">{{ $row->name }}</th>
                    <th scope="row">{{ $row->barangay }}</th>
                    <th scope="row">{{ $row->municipality }}</th>
                </tr>
            @endforeach
            </tbody>
            </table>
            {{$nyCapture->links()}}
            </div>
        </div>
    </div>
        </div>

        </div>

    </div>

</div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';  

        function generatePDF(){
            var input = $('#payroll-input').val();
            if(input){
                window.open('print/generate-pdf/'+input, '_blank');
            }else{
                alert("Please provide range. Thank you.");
            }
           
        }

    </script>
@endsection

@section('script')

@endsection


