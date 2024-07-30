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
    <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
        
                <div class="card">
                    <div class="card-header">
                        <h5>PDF FORM</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                            <label for="">Payroll range to be printed (Not Payroll #)</label>
                            <input class="form-control" id="payroll-input" type="text" placeholder="1, 1-100"><br>
                            <label for="">Municipality</label>
                            <select name="municipality" class="form-control" id="municipality">
                                    @foreach(array_unique(array_column($options, 'municipality')) as $municipality)
                                        <option value="{{ $municipality }}">{{ $municipality }}</option>
                                    @endforeach
                                </select><br>
                                <label for="">Modality</label>
                                <select name="modality" class="form-control" id="modality">
                                    @foreach(array_unique(array_column($options, 'modality')) as $modality)
                                        <option value="{{ $modality }}">{{ $modality }}</option>
                                    @endforeach
                                </select><br>
                                <label for="">Year</label>
                                <select name="year" class="form-control" id="year">
                                    @foreach(array_unique(array_column($options, 'year')) as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select><br>
                            <span class="input-group-text btn btn-primary" onclick="generatePDF()">Generate PDF</span>
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

            var municipality = $('#municipality').val();
            var modality = $('#modality').val();
            var year = $('#year').val();

            if(input){
                window.open('/print/generate-pdf/'+input+'/'+municipality+'/'+modality+'/'+year, '_blank');
            }else{
                alert("Please provide range. Thank you.");
            }       
        }
    </script>
@endsection


@section('script')
@endsection







