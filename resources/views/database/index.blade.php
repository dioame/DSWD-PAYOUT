<?php 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

$connection = DB::connection()->getPdo();

// Fetch all database names using a raw SQL query
$databases = $connection->query('SHOW DATABASES LIKE "%dswd%" ')->fetchAll(PDO::FETCH_COLUMN);
$databaseName = Config::get('database.connections.mysql.database');
// var_dump($databases);
?>
<!-- <h1>hello</h1> -->



@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Database {{$databaseName}}</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Database {{$databaseName}}</li>
@endsection

@section('content')




<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
        
                <div class="card">
                    <div class="card-header">
                        <h5>Databases <a href="{{route('database.create-form')}}">(Create New)</a></h5>
                    </div>
                    <div class="card-body">
                    <select name="" id="selectdb" class="form-control" >
                    <option value="{{$databaseName}}" hidden>{{$databaseName}}</option>
                    @foreach($databases as $database)
                        <option value="{{$database}}">{{$database}}</option>
                    @endforeach
                    </select>
                    <br>
                    <button class="btn btn-primary form-control" onclick="changeDBConnection()">Save</button>
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


<script>
       function changeDBConnection() {
            var db = $('#selectdb').val();
            // console.log(db);
            if (confirm('Are you sure you want to change database connection?')) {
                $.ajax({
                    url: '/database/change',
                    type: 'PUT',
                    data: {
                        db: db
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        alert("Migration will be perform.");
                        // location.reload();
                        $.get('/database/migrate', function(){
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error) {
                        // handle error response
                    }
                });
            }
        }

</script>

@endsection







