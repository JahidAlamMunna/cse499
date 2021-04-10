@extends('layouts.admin')
@section('content')
<div class="container">
    <h4 class="text-center lead">Edit a Doctor</h4>
    <form method="POST" action="{{route('doctor.update', ['id' => $doctor->doc_id])}}">
     {{ method_field('PUT') }}
    @csrf

    <div class="form-group">
            <label for="name">Doctor Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="{{$doctor->doc_name}}">
        </div>
        <div class="form-group">
            <label for="spec">Specialized in</label>
            <input type="text" class="form-control" id="spec" name="spec" placeholder="{{$doctor->doc_spec}}">
        </div>
        <div class="form-group">
            <label for="spec">Doctor Hospital</label>
            <input type="text" class="form-control" id="hospital" name="hospital" placeholder="{{$doctor->doc_hospital}}">
        </div>
        <div class="form-group">
            <label for="spec">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="{{$doctor->doc_contact}}">
        </div>
        <button type="submit" class="btn btn-primary my-3">Add Doctor</button>
    </form>



</div>
@endsection

