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


<div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
				<?php 
                            $host = gethostbyname(gethostname());
                            $connection = @fsockopen($host, 8000, $errno, $errstr, $timeout);
							$msg = "";
                            //    $current_host = ($connection) ? "http://{$host}:8000" : env('L5_SWAGGER_CONST_HOST', config('app.url'));
                                if($connection){
									// Execute ipconfig command
									exec("ipconfig", $output);

									// Find the line containing IPv4 address
									$ipv4Line = '';
									foreach ($output as $line) {
										if (strpos($line, 'IPv4 Address') !== false) {
											$ipv4Line = $line;
											break;
										}
									}

									// Extract IPv4 address
									if (!empty($ipv4Line)) {
										preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $ipv4Line, $matches);
										$ipv4Address = isset($matches[0]) ? $matches[0] : 'IPv4 Address not found';
									} else {
										$ipv4Address = 'IPv4 Address not found';
									}

									// Display IPv4 address
									$msg = "Server running  <a href='#' class='btn btn-primary'>". $ipv4Address."</a>";

                                }else{
									$msg = "Server not yet running. 
									<a href='".asset('storage/downloads/server.bat')."' class='btn btn-primary'>Server Executable</a>
									<a href='".asset('storage/downloads/update.bat')."' class='btn btn-success'>Update Executable</a>
									<a href='".asset('storage/downloads/backup.bat')."' class='btn btn-warning'>Backup Executable</a>";
                                    ?>
                                    <?php
                                }
                            ?>
                    <h5><?= $msg ?></h5>
                </div>
            </div>
        </div>
      
    </div>


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

<div class="card">
		<div class="card-header">
			<h5>Payroll Summary</h5>
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
				<div class="col-lg-12 col-md-12">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Municipality</th>
								<th>Barangay</th>
								<th>Payroll</th>
								<th>Captured</th>
							</tr>
						</thead>
						<tbody>
							@foreach($payrollSummary as $payroll)
								<tr>
									<td>{{$payroll->municipality}}</td>
									<td>{{$payroll->barangay}}</td>
									<td>{{$payroll->payroll}}</td>
									<td>{{$payroll->capture}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
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
