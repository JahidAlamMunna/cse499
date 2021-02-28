@extends('layouts.admin')

@section('content')
<div class="container">
    <h4 class="text-center lead">Add a new medicine</h4>
    <form method="POST" action="{{route('medicine.store')}}">
    @csrf
        <div class="form-row">
            <div class="col">
            <input type="text" name="name" class="form-control" placeholder="Medicine Name">
            </div>
            <div class="col">
            <input type="text" name="stock" class="form-control" placeholder="Stock">
            </div>
            <div class="col">
            <input type="text" name="price" class="form-control" placeholder="Price">
            </div>
        </div>
        <button type="submit" class="btn btn-primary my-3">Add</button>
    </form>
</div>
@endsection