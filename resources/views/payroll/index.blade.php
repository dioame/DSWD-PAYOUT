@extends('layouts.app')

@section('title', 'PDS')

@section('content')

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
    @foreach($payroll as $row)
        <tr>
            <th scope="row">{{++$count}}</th>
            <th scope="row">{{ $row->payroll_no }}</th>
            <td>{{ $row->name }}</td>
            <td>
                <div style='width:30px;'>
                <a href="{{ asset('storage/pictures/' . basename($row->path)) }}" target=_blank><img src="{{ asset('storage/pictures/' . basename($row->path)) }}" alt="" style='max-width:100%;max-height:100%;border-radius:50px;'></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
    {!! $payroll->links() !!}


    @endsection

@section('script')

@endsection
