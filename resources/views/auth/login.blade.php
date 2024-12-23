<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.png')}}" type="image/x-icon">
    <title>KC - Payout Documenter System (PDS)</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    @include('layouts.css')
    @yield('style')
    <style>
      body {
        background: #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        font-family: 'Roboto', sans-serif;
      }

      .form-container {
        background: #fff;
        padding: 2rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
        text-align: center;
      }

      .form-container h1 {
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        color: #333;
      }

      .form-group {
        margin-bottom: 1rem;
      }

      .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #666;
      }

      .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 1rem;
        color: #333;
      }

      .btn-primary {
        width: 100%;
        padding: 0.75rem;
        background-color: #6a11cb;
        border: none;
        border-radius: 4px;
        color: #fff;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      .btn-primary:hover {
        background-color: #2575fc;
      }

      .loader-wrapper {
        display: none;
      }

      .tap-top {
        display: none;
      }
    </style>
  </head>
  <body>
    <div class="form-container">
      <h1>Login to KC PDS</h1>
  

      <form action="{{ route('login') }}" method="POST">
        @csrf
  
        <div class="form-group">
          <label for="username">Username</label>
          <input type="username" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
      
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
      @error('error_message')
          <span>{{ $message }}</span>
      @enderror
    </div>
    <!-- latest jquery-->

  </body>
</html>
