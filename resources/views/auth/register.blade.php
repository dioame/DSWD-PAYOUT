


@extends('layouts.master')

@section('title', 'Generate PDF')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

@section('style')
@endsection

@section('content')

<div class="container-fluid">


      <h1>Add to KC PDS</h1>
      <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="name" class="form-control" id="name" name="name" placeholder="name" required>
        </div>
        <div class="form-group">
          <label for="id_number">ID Number</label>
          <input type="id_number" class="form-control" id="id_number" name="id_number" placeholder="ID Number" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
      </form>
    @error('error_message')
          <span>{{ $message }}</span>
      @enderror
    </div>
    <!-- latest jquery-->
    @include('layouts.script')  
    <!-- Plugin used-->
    {{-- <script type="text/javascript">
      if ($(".page-wrapper").hasClass("horizontal-wrapper")) {
            $(".according-menu.other" ).css( "display", "none" );
            $(".sidebar-submenu" ).css( "display", "block" );
      }
    </script> --}}
    @stack('scripts')
  </body>
@endsection

