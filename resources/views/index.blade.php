@extends('layouts.app')

@section('title', 'PDS')

@section('content')
<div class="container-fluid">
    <div class="row starter-main">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>DSWD CFW Payout System</h5>
                </div>
                <div class="card-body">
                    <div class="qrcode">
                     <?php 
                       $host = gethostbyname(gethostname());
                       $connection = @fsockopen($host, 8000, $errno, $errstr, $timeout);
                    //    $current_host = ($connection) ? "http://{$host}:8000" : env('L5_SWAGGER_CONST_HOST', config('app.url'));
                        if($connection){
                            ?>
                                {!! $qrCode !!} <br> {!! $host !!}
                            <?php
                        }else{
                            echo "Seems like php server/port not yet exist. Please run  `php artisan serve --host 0.0.0.0` on terminal.";
                        }
                     ?>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
</div>
@endsection

@section('script')
@endsection
