@extends('layouts.app')

@section('content')
<div class="home-section">
    <div class="container">
        <div class="homepage-text">
        <h1 class="text-left display-3">Welcome To HAMDS<h1>
        <h5 class="lead text-left">The largest online healthcare website in Bangladesh</h5>
        <div class="text-left mt-4">
            <button class="mr-2"><a class="" href="{{route('medicine.index')}}">Medicines</a></button>
            <button class=""><a class="" href="{{route('doctor.index')}}">Make Appointment</a></button>
        </div>

        </div>
    </div>
</div>
<div class="container">

    <!-- Search Bar -->


    <!-- <div class="row justify-content-center text-center my-4">
        <div class="col-md-9">
            <form>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button">Search</button>
                </div>
            </div>
            </form>
        </div>
    </div> -->

    <h3 class="home-heading text-center my-5 underline-from-center">Featured Medicines</h3>
      
    @foreach($medicines->chunk(4) as $meds)
    <div class="row">
        @foreach($meds as $med)
            <div class="col-md-3">
                        <div class="card my-3 med-card">
                            <div class="card-img">
                                <img class="card-img-top" src="{{asset('assets/').'/'.$med->med_name.'.jpg' }}" alt="Card image cap">
                                <div class="med-details">500mg Tablet</div>
                            </div>


                                <div class="card-body">
                                    <h5 class="card-title text-center">{{$med->med_name}}</h5>
                                    
                                    <div class="d-flex justify-content-between px-4">
                                    <form action="{{route('cart.store')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$med->med_id}}">
                                        <input type="hidden" name="price" value="{{$med->med_price}}">
                                        <input type="hidden" name="name" value="{{$med->med_name}}">
                                        <input type="hidden" name="qty" value="1">
                                        <button type="submit" class="btn "><i class="fas fa-shopping-cart"></i></button>
                                    </form>                                    
                                    <form action="{{route('medicine.show',['id' => $med->med_id])}}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn">DETAILS</button>
                                    </form>
                                    </div>
                                </div>
                        </div>
            </div>
        @endforeach
    </div>    
    @endforeach








</div>
<div class="footer">
        <div class="text-center">
        &copyCopyright Hamds 2019
        </div>
    </div>
@endsection


