<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'HAMDS') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #1B1B1E; color:#EAE2B7">

<div class="container">


<div class="agent d-flex flex-column justify-content-center align-items-center">
<h1 class="agent-head mb-5">Agent Simulator</h1>
<h2 class="mb-3">How much money do you want to send?</h2>

<form action="{{route('agentsimulator.paid')}}" method="POST">
    @csrf
  <div class="form-group">
    <input type="text" class="form-control" name="amount" id="amount" aria-describedby="amount" placeholder="Enter Amount">
    <small id="amount" class="form-text text-muted">Please Enter The Amount</small>
  </div>
  <div class="d-flex justify-content-center">
    <button type="submit" class="btn btn-primary">Send Money</button>
  </div>


</form>

</div>

</div>
</body>
</html>
