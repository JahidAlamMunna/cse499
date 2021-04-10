@extends('layouts.admin')

@section('content')
<div class="container">


    <div class="d-flex justify-content-between">
        <h4 class="admin-heading"><i class="fas fa-pills"></i> Doctor</h4>

        <div class="admin-add-btn"><a href="{{route('doctor.create')}}"><button class="btn btn-primary ">Add New Doctor</button></a></div>
    </div>

    <div class="input-group mb-3">
        <input @keyup="searchit" v-model="search" type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button @click="searchit" class="btn btn-outline-secondary" type="button">Search</button>
        </div>
    </div>
    
    <doc-table :doctors="{{$doctors}}"></doc-table>
</div>
@endsection

