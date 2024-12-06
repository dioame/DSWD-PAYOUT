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
                    <div style="width: 100%; border: 1px dashed black; height: 600px; position: relative; overflow: hidden;" id="latest">

                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                    
                </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';

        $.get('live-data', function(data){
            $('#latest').html('<img src="storage/'+data.latest_capture.path+'" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">')
        })
    </script>
@endsection


