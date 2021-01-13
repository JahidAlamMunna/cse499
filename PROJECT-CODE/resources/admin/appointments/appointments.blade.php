@extends('layouts.admin')

@section('content')
<div class="container">

@if (session('success'))

<div class="alert alert-success my-3" role="alert">
  {{session('success')}}
</div>

@endif

    <div class="d-flex justify-content-between">
        <h4 class="admin-heading">Appointments</h4>
    </div>


    <table class="mt-4 table table-striped table-hover">
        <thead class="thead-dark">
            <tr class="">
            <th scope="col">ID</th>
            <th scope="col">User Name</th>
            <th scope="col">Doctor Name</th>
            <th scope="col">Appointment Date</th>
            <th scope="col">Added On</th>
            <th scope="col">Updated On</th>
            <th scope="col">Approval</th>
            
            </tr>
        </thead>
        <tbody>
            @foreach($apps as $app)
                <tr>
                <th scope="row">{{$app->app_id}}</th>
                @foreach($users as $user)
                @if($user->id == $app->user_id)
                <td>{{$user->name}}</td>
                @endif
                @endforeach
                @foreach($docs as $doc)
                @if($doc->doc_id == $app->doctor_id)
                <td>{{$doc->doc_name}}</td>
                @endif
                @endforeach
                <td>{{$app->app_date}}</td>
                <td>{{$app->created_at}}</td>
                <td>{{$app->updated_at}}</td>
                <td>
                    <form action="{{route('appointment.approve')}}" method="POST">
                        @csrf
                    <input type="hidden" name="id" value="{{$app->app_id}}">
                    <button type="submit" class="btn btn-warning">Approve</button>
                    </form>
                </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    </div>
</div>
@endsection