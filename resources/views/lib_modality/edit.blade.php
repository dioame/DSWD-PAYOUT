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
        <h1>Edit Modality</h1>
        <form action="{{ route('lib_modalities.update', $libModality) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" value="{{ $libModality->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ $libModality->description }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>

@endsection

@section('script')

@endsection







