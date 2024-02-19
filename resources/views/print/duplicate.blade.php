@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Default</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Default</li>
@endsection

@section('content')
<div class="container-fluid">

   
    <div class="row">

   

      
      <!--  -->
 

        <div class="col-lg-12 col-md-12">
            
        <div class="card">
        <div class="card-header">
        <h5>Duplicate Capture</h5>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
            <th scope="col">Payroll #</th>
            <th scope="col">Captured at</th>
            <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
            @foreach($duplicate as $row)
                <tr>
                    <th scope="row">{{ $row->payroll_no }}</th>
                    <td>{{ $row->captured_at }}</td>
                    <td>
                        <div style='width:30px;'>
                        <a href="{{ asset('storage/pictures/' . basename($row->path)) }}" target=_blank><img src="{{ asset('storage/pictures/' . basename($row->path)) }}" alt="" style='max-width:100%;max-height:100%;border-radius:50px;'></a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
            </table>
            {{$duplicate->links()}}
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

    </script>
@endsection

@section('script')

@endsection


