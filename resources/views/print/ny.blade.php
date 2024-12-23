@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Not Yet Capture</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item active">Not Yet Capture</li>
@endsection

@section('content')
<div class="container-fluid">


    <div class="modal fade show" id="editModal" tabindex="-1" aria-labelledby="exampleModal" style="display: hide; padding-left: 0px;" aria-modal="true" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Edit Item</h4>
                <br>
                <div class="modal-toggle-wrapper"> 
                <?php 
                    $options = [
                        'unclaimed' => 'Unclaimed / not yet claimed',
                        'claimed_no_photo_docs' => 'Claimed but no photo docs',
                        'will_not_claim' => 'Will not claim',
                        'duplication' => 'Duplication',
                    ];

                    $select = '<select class="form-control" onchange="" id="selectInput">';
                    $select .= "<option value='' hidden>--Select Status--</option>";
                    foreach ($options as $value => $label) {
                        $select .= "<option value='$value'>$label</option>";
                    }
                    $select .= '</select>';
                    
                ?>
                <?= $select ?>
                <br>
                <button class="btn btn-primary" onclick="saveStatus()">Save</button>

                </div>
            </div>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-md-12">
        
                <div class="card">
                    <div class="card-header">
                        <h5>Not Yet Capture List</h5>
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
    function claimedStatus(id,status){
        var _c = confirm("Are you sure to change status?");
        if(_c){
            $.ajax({
                url: '/kc-pds/payroll/' + id+'/status/'+status,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    // handle success response
                    // location.reload();
                    // $('#payroll-table').DataTable().ajax.reload();
                },
                error: function(xhr, status, error) {
                    // handle error response
                }
            });
        }
    }

    var selectedId = null;
    function selectModal(id){
        selectedId = id;
    }

    function saveStatus(){
        $('#editModal').modal('hide');
        var id = selectedId;
        var status = $('#selectInput').val();

        $.ajax({
            url: '/kc-pds/payroll/' + id+'/status/'+status,
            type: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response);
                // handle success response
                // location.reload();
                
                $('#payroll-table').DataTable().ajax.reload(null,false);
            },
            error: function(xhr, status, error) {
                // handle error response
            }
        });

    }
    



</script>
@endsection







