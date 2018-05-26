<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!--   <link rel="stylesheet" type="text/css" href="/pathto/css/sweetalert.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>
    <style type="text/css">
    p{
        font-size: 11px;
    }
       
    .table1 {
    font-family: sans-serif;
    font-size: 11px;
    color: #000;
    border-collapse: collapse;
    }
}
 
.table1, th, td {
    border: 1px solid #999;
    padding: 4px 12px;
}


    </style>
<body>

 
</body>
</html>
