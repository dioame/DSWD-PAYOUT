@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Trash Capture</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Trash Capture</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12 col-md-12">
        
                <div class="card">
                    <div class="card-header">
                        <h5>Trash Capture List <button class='btn btn-primary'>View Photos</button></h5>
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
        function confirmRestore(id) {
            if (confirm('Are you sure you want to restore this item?')) {
                    $.ajax({
                        url: '/capture/' + id+'/restore',
                        type: 'PUT',
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







