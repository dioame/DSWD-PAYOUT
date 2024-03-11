<?php 
use SimpleSoftwareIO\QrCode\Facades\QrCode;
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

<style>
    pre {
    background-color: #f4f4f4;
    padding: 10px;
    border-radius: 5px;
    overflow-x: auto;
  }

  .copy-button {
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    margin-left: 10px;
  }
</style>


<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>DSWD CFW Payout System</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa-spin fa-cog"></i></li>
                            <li><i class="view-html fa fa-code"></i></li>
                            <li><i class="icofont icofont-maximize full-card"></i></li>
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <li><i class="icofont icofont-error close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="qrcode">
                     <?php 
                       $host = gethostbyname(gethostname());
                       $connection = @fsockopen($host, 8000, $errno, $errstr, $timeout);
                    //    $current_host = ($connection) ? "http://{$host}:8000" : env('L5_SWAGGER_CONST_HOST', config('app.url'));
                        if($connection){

                            $qrCode = QrCode::size(300)->generate($host);
                            ?>
                                {!! $qrCode !!} <br> {!! $host !!}
                            <?php
                        }else{
                            ?>
                            <p>Seems like PHP server/port not yet exist. Please run the following command in your terminal:</p>

                            <pre id="command">
                            php artisan serve --host 0.0.0.0
                            </pre>

                    
                            <?php
                        }
                     ?>
                    </div>
                    <div class="code-box-copy">
                        <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
    
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
