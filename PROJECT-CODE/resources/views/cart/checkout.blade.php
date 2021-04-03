@extends('layouts.app')

@section('content')
<div class="container mt-3">

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
    <h4 class="page-heading">Please Select Payment Method</h4>
    <br>
    <br>
    <form action="{{route('orders.store')}}" method="POST">
    @csrf
    <div class="d-flex flex-row justify-content-center">
        <label class="pay_method">
            <input type="radio" name="pay_method" value="bkash" >
            <img src="{{asset('assets/bkash-logo.jpg')}}">        
        </label>
        <label class="pay_method mx-3">
            <input type="radio" name="pay_method" value="ucash" >
            <img src="{{asset('assets/ucash-logo.png')}}">        
        </label>
    </div>
        <div class="text-center mt-5">
            <button type="submit" class="crt-btn">Place Order</button>
        </div>
    </form>



</div>

@endsection