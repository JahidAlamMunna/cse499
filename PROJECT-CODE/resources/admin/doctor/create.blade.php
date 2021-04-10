@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="text-center lead">Add a new Doctor</h4>
    <form method="POST" action="{{route('doctor.store')}}">
    @csrf        
        <div class="form-group">
            <label for="name">Doctor Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Doctor Name">
        </div>
        <div class="form-group">
            <label for="spec">Specialized in</label>
            <input type="text" class="form-control" id="spec" name="spec" placeholder="Specialized in">
        </div>
        <div class="form-group">
            <label for="spec">Doctor Hospital</label>
            <input type="text" class="form-control" id="hospital" name="hospital" placeholder="Doctor Hospital">
        </div>
        <div class="form-group">
            <label for="spec">Contact</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
        </div>
        <button type="submit" class="btn btn-primary my-3">Add Doctor</button>
    </form>


</div>
@endsection

