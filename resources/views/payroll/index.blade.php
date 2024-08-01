@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Payroll</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Payroll</li>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12 col-md-12">
        
                <div class="card">
                    <div class="card-header">
                        <h5>Payroll List 
                            <button class="btn btn-danger" onclick="emptyPayroll()"><i class="fa fa-trash"></i> Empty Payroll</button>
                            <a class="btn btn-primary" href="{{route('payroll.importForm')}}"><i class="fa fa-upload"></i> Import Payroll</a>
                        </h5>
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
    function emptyPayroll(){
        if (confirm('Are you sure you want to empty payroll?')) {
            $.ajax({
                url: '/kc-pds/payroll/all',
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







