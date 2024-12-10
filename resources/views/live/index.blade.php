<?php 
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Config;

$options = [
	'unclaimed' => 'Unclaimed / not yet claimed',
	'claimed_no_photo_docs' => 'Claimed but no photo docs',
	'will_not_claim' => 'Will not claim',
	'duplication' => 'Duplication',
];
?>
@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Home</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Home</li>
@endsection


@section('content')


<div class="row starter-main">
    <div style="margin:20px;background:white;border-radius:10px;padding:20px;">
           
        <div class="row">
                <div class="col-lg-3 col-md-3">
                    <h5>Payroll# <span id="latest_payroll"></span></h5>
                    <div style="width: 100%; border: 1px dashed black; height: 63vh; position: relative; overflow: hidden;" id="latest">

                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    <h5>List of Captured</h5>
                    <div class="row" id="captures">
                        
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';

        setInterval(() => {
            console.log(1);
            $.get('live-data', function(data){
                // console.log(data);
                $('#latest').html('<img src="storage/'+data.latest_capture.path+'" style="max-width:100%;">');
                $('#latest_payroll').text(data.latest_capture.payroll_no);

                // Loop through the captures and add them to the captures HTML container
                let capturesHtml = '';
                data.captures.forEach(function(capture) {
                    capturesHtml += '<div class="col-lg-2">';
                        capturesHtml += '<div style="border: 1px dashed black; height: 30vh;margin-top:10px;overflow:hidden;padding:5px;">';
                            capturesHtml += '<span>Payroll# '+capture.payroll_no+'</span>';
                            capturesHtml += '<img src="storage/' + capture.path + '" style="max-width:100%;">';
                        capturesHtml += '</div>';
                    capturesHtml += '</div>';
                });

                // Append the generated HTML to the captures container
                $('#captures').html(capturesHtml);
               
            })   
        }, 1000);

        
    </script>
@endsection


