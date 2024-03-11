@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Trash</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Trash</li>
@endsection

@section('content')
<div class="container-fluid">

   
    <div class="row">

   

      
      <!--  -->
 

        <div class="col-lg-12 col-md-12">
            
        <div class="card">
        <div class="card-header">
        <h5>Trash Capture</h5>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
            <th scope="col">Capture #</th>
            <th scope="col">Payroll #</th>
            <th scope="col">Captured at</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($trash as $row)
                <tr>
                    <th scope="row">{{ $row->id }}</th>
                    <th scope="row">{{ $row->payroll_no }}</th>
                    <td>{{ $row->captured_at }}</td>
                    <td>
                        <div style='width:30px;'>
                        <a href="{{ asset('storage/pictures/' . basename($row->path)) }}" target=_blank><img src="{{ asset('storage/pictures/' . basename($row->path)) }}" alt="" style='max-width:100%;max-height:100%;border-radius:50px;'></a>
                        </div>
                    </td>
                    <td>
                    <!-- Restore button -->
                    <form action="{{ route('capture.restore', $row->id) }}" method="POST" id="restoreForm">
                        @csrf
                        @method('PUT') <!-- Assuming you're using PUT/PATCH method for restore -->
                        <button type="submit" class="btn btn-success btn-xs" onclick="confirmRestore('{{ $row->id }}')"> Restore </button>
                    </form>
                </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            {{$trash->links()}}
            </div>
        </div>
    </div>
        </div>

        </div>

    </div>

</div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';  

        function generatePDF(){
            var input = $('#payroll-input').val();
            if(input){
                window.open('print/generate-pdf/'+input, '_blank');
            }else{
                alert("Please provide range. Thank you.");
            }
           
        }
        
        function confirmDelete(id) {
            if (confirm("Are you sure you want to restore this item?")) {
                document.getElementById('restoreForm' + id).submit();
            }
        }

    </script>
@endsection

@section('script')

@endsection


