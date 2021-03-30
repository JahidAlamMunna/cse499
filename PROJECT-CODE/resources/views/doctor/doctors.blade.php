@extends('layouts.app')

@section('content')
<div class="container mt-3">
@if (session('success'))

<div class="alert alert-success my-3" role="alert">
  {{session('success')}}
</div>

@endif
<h3>Doctors</h3>

<div class="list-group">

  @foreach($doctors as $doctor)

  
  <a href="#" class="list-group-item list-group-item-action my-2">
    <div class="row">
      <div class="col-md-3 doc-image">
        <img src="{{asset('assets/doctor.jpg')}}" alt="" width="90%">
      </div>
      <div class="col-md-9 doc-details mt-4">
      <dl class="row">
        <dt class="col-sm-3">Doctor Name</dt>
        <dd class="col-sm-9">{{$doctor->doc_name}}</dd>

        <dt class="col-sm-3">Hospital</dt>
        <dd class="col-sm-9">{{$doctor->doc_hospital}}</dd>

        <dt class="col-sm-3">Specialized In</dt>
        <dd class="col-sm-9">{{$doctor->doc_spec}}</dd>

        <dt class="col-sm-3">Doctor Post</dt>
        <dd class="col-sm-9">Dhaka</dd>

        <dt class="col-sm-3">Division</dt>
        <dd class="col-sm-9">Dhaka</dd>

      <dt class="col-sm-3">Division</dt>
      <dd class="col-sm-9">Dhaka</dd>

        <dt class="col-sm-3">Degree</dt>
        <dd class="col-sm-9">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aperiam, repellendus.</dd>
      </dl>
      </div>
    </div>
      
      <form action="{{route('appointment.store')}}" method="POST">
        @csrf
          <input type="hidden" name="doctor_id" class="form-control" value="{{$doctor->doc_id}}">

          <div class="text-right mt-2">
              <button type="submit" class="crt-btn">Make Appointment</button>
          </div>
      </form>
  </a>



  @endforeach

</div>

    
</div>
@endsection