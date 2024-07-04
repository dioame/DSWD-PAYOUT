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
				<label for="">Auto-refresh</label>
				<select name="" id="autorefresh" onclick="changeValue(this.value)">
					<option value="0">---</option>
					<option value="5">5 Seconds</option>
					<option value="10">10 Seconds</option>
					<option value="15">15 Seconds</option>
					<option value="30">30 Seconds</option>
					<option value="60">60 Seconds</option>
				</select>
				<?php 
                            $host = gethostbyname(gethostname());
                            $connection = @fsockopen($host, 8000, $errno, $errstr, $timeout);
							$databaseName = Config::get('database.connections.mysql.database');
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
									$msg = '<span class="badge badge-light-success">'."Database: ".strtolower($databaseName).'</span>'."<br> Server running  <a href='#' class='btn btn-primary'>". $ipv4Address."</a>";

                                }else{
									$msg = '<span class="badge badge-light-success">'."Database: ".strtolower($databaseName).'</span>'."<br> Server not yet running. 
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
		
		<a href="payroll">
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
		</a>
    </div>
    <div class="col-lg-3 col-md-3">
	<a href="print">
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
							</a>
    </div>

    <div class="col-lg-3 col-md-3">
		<a href="print/duplicate-capture">
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
		</a>
    </div>

    <div class="col-lg-3 col-md-3">
		<a href="print/ny-capture">
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
		</a>
    </div>
    <div class="col-lg-3 col-md-3">
		<a href="print/ny-payroll">
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
		</a>
    </div>

    <div class="col-lg-3 col-md-3">
		<a href="print/trash">
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
		</a>
    </div>

</div>

<div class="row">

<div class="col col-lg-8 col-md-8">
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
								<th>Balance</th>
							</tr>
						</thead>
						<tbody>
							@php
								$total_payroll = 0;
								$total_capture = 0;
								$total_balance = 0;
							@endphp
							@foreach($payrollSummary as $payroll)
								<tr>
									<td>{{$payroll->municipality}}</td>
									<td>{{$payroll->barangay}}</td>
									<td>{{$payroll->payroll}}</td>
									<td>{{$payroll->capture}}</td>
									<td>{{$payroll->payroll - $payroll->capture}}</td>
								</tr>
								@php
									$total_payroll += $payroll->payroll;
									$total_capture += $payroll->capture;
									$total_balance += ($payroll->payroll - $payroll->capture);
								@endphp
							@endforeach
						</tbody>
						<tfoot>
							<th colspan=2>Total</th>
							<th>{{$total_payroll}}</th>
							<th>{{$total_capture}}</th>
							<th>{{$total_balance}}</th>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>

	</div>

	<div class="col col-lg-4 col-md-4">

	<div class="card">
		<div class="card-header">
			<h5>Claimed Status</h5>
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
						<table class="table">
							<tr>
								<th>Status</th>
								<th>#</th>
							</tr>
							@foreach($claimStatus as $row)
								<tr>
									<td>{{$row->claimed_status ? $options[$row->claimed_status] : '-'}}</td>
									<td>{{$row->count}}</td>
								</tr>
							@endforeach
						</table>
				</div>
			</div>
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


		// function changeValue(val){
		// 	var time = val*1000;
		// }
	

		// setInterval(() => {
		// 	location.reload();
		// }, 10000);
    </script>
@endsection

@section('script')
@endsection
