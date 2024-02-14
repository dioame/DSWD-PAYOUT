@extends('layouts.app')

@section('title', 'PDS')

@section('content')
<div class="container-fluid">
    
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="input-group">
                <input class="form-control" id="payroll-input" type="text" placeholder="1, 1-100"><span class="input-group-text btn btn-primary" onclick="generatePDF()">Generate PDF</span>
            </div>
        </div>
    </div>
    <hr>

   
    <div class="row">

   


        <div class="col-lg-6 col-md-6">
      <!--  -->
      <div class="card">
        <div class="card-header">
        <h5>Latest Capture</h5>
        </div>
        <div class="card-body">


        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Payroll #</th>
            <th scope="col">Captured at</th>
            <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
                
            <?php $count = 0; ?>
            @foreach($latest as $row)
                <tr>
                    <th scope="row">{{++$count}}</th>
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
            {!! $latest->links() !!}
            </div>
        </div>
    </div>
        </div>
      
      <!--  -->
 

        <div class="col-lg-6 col-md-6">
            
        <div class="card">
        <div class="card-header">
        <h5>Duplicate Capture</h5>
        </div>
        <div class="card-body">
        <div class="table-responsive">
            <table class="table">
            <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Payroll #</th>
            <th scope="col">Captured at</th>
            <th scope="col">Image</th>
            </tr>
            </thead>
            <tbody>
            <?php $count = 0; ?>
            @foreach($duplicate as $row)
                <tr>
                    <th scope="row">{{++$count}}</th>
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
            {!! $duplicate->links() !!}
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


