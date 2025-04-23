@php
    $defaultTitle= 'web development company in kota - rajasathan';
    $defaultDescription = 'web development company in kota - rajasathan';
    $defaultKeywords = 'web development company in kota - rajasathan';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="google-site-verification" content="HhkOzn594eYQVIRs7rDuff-vAU0o8n-Kn-YvZ3Phi1Q" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title',$defaultTitle)</title>
    <meta name="description" content="@yield('description',$defaultDescription)"/> 
    <meta name="keywords" content="@yield('keywords',$defaultKeywords)"/>   
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}"/>   
    {!!'<style>'!!}
        @foreach (Helpers::categories() as $category)
            .{{\Str::slug($category->category_name)}} {background-color: {{ $category->category_design['bg'] }};color: {{ $category->category_design['text_color'] }}; }
        @endforeach
    {!!'</style>'!!}
</head>
<body> 
<div class="loader">
   <div class="loader-bar"></div>
</div>
     