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

  .centered-content {
    text-align: center; /* Center align text */
    margin: auto; /* Center align block elements */
    display: flex; /* Use flexbox for centering */
    flex-direction: column; /* Arrange children in a column */
    align-items: center; /* Center align items horizontally */
    justify-content: center; /* Center align items vertically */
    height: 100%; /* Fill the height of parent */
}
</style>



<div class="container-fluid">

<div class="row">
    <div class="col-lg-3 col-md-3">
            <div class="card widget-1">
			  <div class="card-body"> 
				<div class="widget-content">
				  <div class="widget-round secondary">
					<div class="bg-round">
					  <!-- <svg class="svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#cart"> </use>
					  </svg> -->
                      <i data-feather="file-minus"></i>
					  <!-- <svg class="half-circle svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#halfcircle"></use>
					  </svg> -->
					</div>
				  </div>
				  <div> 
					<h4>{{$countPayroll}}</h4><span class="f-light">Payroll</span>
				  </div>
				</div>
				<div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+100%</span></div>
			  </div>
			</div>
    </div>
    <div class="col-lg-3 col-md-3">
            <div class="card widget-1">
			  <div class="card-body"> 
				<div class="widget-content">
				  <div class="widget-round secondary">
					<div class="bg-round">
					  <!-- <svg class="svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#cart"> </use>
					  </svg> -->
                      <i data-feather="instagram"></i>    
					  <!-- <svg class="half-circle svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#halfcircle"></use>
					  </svg> -->
					</div>
				  </div>
				  <div> 
					<h4>{{$countCapture}}</h4><span class="f-light">Capture</span>
				  </div>
				</div>
				<div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+100%</span></div>
			  </div>
			</div>
    </div>

    <div class="col-lg-3 col-md-3">
            <div class="card widget-1">
			  <div class="card-body"> 
				<div class="widget-content">
				  <div class="widget-round secondary">
					<div class="bg-round">
					  <!-- <svg class="svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#cart"> </use>
					  </svg> -->
                      <i data-feather="instagram"></i>    
					  <!-- <svg class="half-circle svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#halfcircle"></use>
					  </svg> -->
					</div>
				  </div>
				  <div> 
					<h4>{{$countDuplicate}}</h4><span class="f-light">Duplicate Capture</span>
				  </div>
				</div>
				<div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+100%</span></div>
			  </div>
			</div>
    </div>

    <div class="col-lg-3 col-md-3">
            <div class="card widget-1">
			  <div class="card-body"> 
				<div class="widget-content">
				  <div class="widget-round secondary">
					<div class="bg-round">
					  <!-- <svg class="svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#cart"> </use>
					  </svg> -->
                      <i data-feather="instagram"></i>    
					  <!-- <svg class="half-circle svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#halfcircle"></use>
					  </svg> -->
					</div>
				  </div>
				  <div> 
					<h4>{{$countNYCapture}}</h4><span class="f-light">Not Yet Capture</span>
				  </div>
				</div>
				<div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+100%</span></div>
			  </div>
			</div>
    </div>
    <div class="col-lg-3 col-md-3">
            <div class="card widget-1">
			  <div class="card-body"> 
				<div class="widget-content">
				  <div class="widget-round secondary">
					<div class="bg-round">
					  <!-- <svg class="svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#cart"> </use>
					  </svg> -->
                      <i data-feather="instagram"></i>    
					  <!-- <svg class="half-circle svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#halfcircle"></use>
					  </svg> -->
					</div>
				  </div>
				  <div> 
					<h4>{{$countNYPayroll}}</h4><span class="f-light">Not in Payroll</span>
				  </div>
				</div>
				<div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+100%</span></div>
			  </div>
			</div>
    </div>

    <div class="col-lg-3 col-md-3">
            <div class="card widget-1">
			  <div class="card-body"> 
				<div class="widget-content">
				  <div class="widget-round secondary">
					<div class="bg-round">
					  <!-- <svg class="svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#cart"> </use>
					  </svg> -->
                      <i data-feather="trash"></i>    
					  <!-- <svg class="half-circle svg-fill">
						<use href="https://laravel.pixelstrap.com/cuba/assets/svg/icon-sprite.svg#halfcircle"></use>
					  </svg> -->
					</div>
				  </div>
				  <div> 
					<h4>{{$countTrash}}</h4><span class="f-light">Trash Capture</span>
				  </div>
				</div>
				<div class="font-secondary f-w-500"><i class="icon-arrow-up icon-rotate me-1"></i><span>+100%</span></div>
			  </div>
			</div>
    </div>

</div>


    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Configurations</h5>
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
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
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

                                    <a href="{{ asset('storage/downloads/server.bat') }}" class="btn btn-primary">Open Cmder</a>
                            
                                    <?php
                                }
                            ?>
                            </div>
                            <div class="code-box-copy">
                                <button class="code-box-copy__btn btn-clipboard" data-clipboard-target="#example-head" title="Copy"><i class="icofont icofont-copy-alt"></i></button>
            
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="centered-content">
                                <h2>KC PDS Capture APP</h2>
                                <img src="{{ asset('storage/downloads/qrcode.png') }}" alt="KC-PDS Capture QR Code">
                            </div>
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
