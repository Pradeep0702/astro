<!doctype html>
<html lang="en">
   <head>
      <title>Admin Panel - Socialit</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      @if(Route::currentRouteName() != 'back.auth')
      <link type="text/css" rel="stylesheet" href="{{asset('backhand/css/style.css')}}"> 
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/> 
      <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.bootstrap4.css"/> 
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
      @else
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      @endif
      <body id="body" class="">
      @if(Route::currentRouteName() != 'back.auth')
      <div class="preloader-container d-flex justify-content-center align-items-center">
         <div class="spinner-border" role="status" aria-hidden="true"></div>
      </div>
      @endif
    