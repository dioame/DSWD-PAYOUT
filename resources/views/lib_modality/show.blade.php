<?php 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

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
    <h3>Modalities</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Modalities</li>
@endsection

@section('content')
<div class="container">
        <h1>View Modality</h1>
        <p><strong>Name:</strong> {{ $libModality->name }}</p>
        <p><strong>Description:</strong> {{ $libModality->description }}</p>
        <a href="{{ route('lib_modalities.index') }}" class="btn btn-primary">Back to List</a>
    </div>

@endsection

@section('script')

@endsection







