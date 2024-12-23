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
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12 col-md-12">
        
                <div class="card">
                    <div class="card-header">
                        <h5>Lib Modalities <a href="{{ route('lib_modalities.create') }}" class="btn btn-primary">Create New Modality</a></h5>
                    </div>
                    <div class="card-body">
                
                        {{ $dataTable->table() }}
                      
                    </div>
                </div>

        </div>
    </div>

</div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

@section('script')
<script>
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                    $.ajax({
                        url: '/lib_modalities/' + id,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // handle success response
                            // location.reload();
                            $('#payroll-table').DataTable().ajax.reload();
                        },
                        error: function(xhr, status, error) {
                            // handle error response
                        }
                    });
                }
        }

      

</script>
@endsection







