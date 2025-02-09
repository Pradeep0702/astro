@php
    $defaultTitle= 'Online Cab Booking and Taxi Service | Affordable  - MyTripBazar';
    $defaultDescription = 'Taxi service booking near me | Taxi hire | Outstation taxi booking | City taxi service |  Round Trip | Airport Taxi | Hassle-free taxi rides | Taxi with affordable fare';
    $defaultKeywords = 'Online taxi booking, cab services, affordable cab, book a cab, city rides, one way trip booking taxi, round trip booking taxi, local booking taxi, airport transfer taxi';
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
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
     