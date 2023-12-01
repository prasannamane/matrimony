<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:url" content="{{ url($url) }}">
    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $description }}">
    <meta property="og:image" content="{{ url($image) }}">
    <meta property="og:image:secure_url" content="URL_OF_YOUR_IMAGE">
    <meta property="og:image:alt" content="Description of the image">

    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="/img/web/fevic.png">


    <link href="{{ url('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <!-- Toastr style -->
    <!-- 1. Dashbord-->
    <link href="{{ url('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet">

    <link href="{{ url('/css/animate.css') }}" rel="stylesheet">
    <link href="{{ url('/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('/css/custom.css') }}" rel="stylesheet">

    <!-- 2. Detail Page -->
    <link href="{{ url('/css/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ url('/css/plugins/slick/slick-theme.css') }}" rel="stylesheet">
</head>




