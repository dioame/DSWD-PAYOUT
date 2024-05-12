
@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Edit Capture Form</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Edit Capture Form</li>
@endsection

@section('content')




<div class="container-fluid">

    <div class="row">
        <div class="col-lg-4 col-md-4"></div>
        <div class="col-lg-4 col-md-4">
        
                <div class="card">
                    <div class="card-header">
                        <h5>Upload Capture</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('capture.upload-folder') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <label for="">ID Number</label><br>
                          <input class="form-control" type="text" name="id_number" placeholder="ID Number" required><br>
                          <label>Select Folder</label><br>
                          <input class="form-control" type="file" name="folder[]" directory webkitdirectory mozdirectory required><br>
                          <button type="submit" class="btn btn-primary">Upload</button>
                      </form>
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







