@extends('layouts.master')
@section('title', 'Default')
@section('content')
<h1>test</h1>

<form action="/capture" method="post">
    @csrf
    <video id="camera-preview" width="640" height="480" autoplay></video>
    <br>
    <button type="submit">Capture Image</button>
</form>

<script>
    import { Camera } from "https://code4fukui.github.io/Camera/Camera.js";

    const camera = new Camera(videoElement, {
    onFrame: async () => {
        // use videoElement as image
    },
    width: 1280,
    height: 720,
    backcamera: true,
    });
    camera.start();
</script>

@endsection
