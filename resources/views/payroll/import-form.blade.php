@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Import Form</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Import Form</li>
@endsection

@section('content')



<div class="container-fluid">

    <div class="row">
    <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
        
                <div class="card">
                    <div class="card-header">
                        <h5>Import Form</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                            <form action="{{ route('payroll.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="id_number">ID Number</label>
                                    <input type="text" class="form-control" id="id_number" name="id_number" required value="16-">
                                </div>

                                <div class="form-group">
                                    <label for="modality">Modality</label>
                                    <select class="form-control" id="modality" name="modality" required>
                                        @foreach($modalities as $modality)
                                            <option value="{{ $modality->name }}">{{ $modality->name }}</option> <!-- Adjust 'name' to your column name -->
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="year">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" required value="<?= date('Y') ?>">
                                </div>

                                <div class="form-group">
                                    <label for="excel_file">Excel File</label>
                                    <input type="file" class="form-control" id="excel_file" name="excel_file" accept=".xls,.xlsx" required>
                                </div>
                                <br>

                                <button type="submit" class="btn btn-primary">Import</button>
                            </form>
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







