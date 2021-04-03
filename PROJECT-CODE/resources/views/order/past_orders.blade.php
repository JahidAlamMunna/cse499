@extends('layouts.app')

@section('content')

<div class="container">


    <div class="page-heading my-4">
        <h2>My Past Orders</h2>
    </div>
    @foreach($orders as $order)

    <div class="card mb-3">
    <div class="card-body">
    

    <div class="porder">
        <div class="d-flex justify-content-between">
            <h4 class="porders-ordernum lead">
                Order <i class="fas fa-hashtag"></i> {{$order->order_id}}
            </h4>

        </div>

    </div>




    <ul class="nav nav-tabs mb-3 orders-tab" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="order-details-{{$order->order_id}}-tab" data-toggle="pill" href="#order-details-{{$order->order_id}}" role="tab" aria-controls="order-details-{{$order->order_id}}" aria-selected="true">Details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="medicines-ordered-{{$order->order_id}}-tab" data-toggle="pill" href="#medicines-ordered-{{$order->order_id}}" role="tab" aria-controls="medicines-ordered-{{$order->order_id}}" aria-selected="false">Medicines Ordered</a>
        </li>
    </ul>
    
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="order-details-{{$order->order_id}}" role="tabpanel" aria-labelledby="order-details-{{$order->order_id}}-tab">
            <p class="porders-details">Order Status: {{$order->order_status}}</p>
            <p class="porders-details">Date: {{$order->created_at}}</p>
            <p class="porders-details">Total: {{$order->total}}</p>
        </div>


        <div class="tab-pane fade" id="medicines-ordered-{{$order->order_id}}" role="tabpanel" aria-labelledby="medicines-ordered-{{$order->order_id}}-tab">

            <table class="mt-4 table table-hover table-striped table-borderless">
            <thead class="thead-dark">
                <tr class="">
                <th scope="col" colspan="5">Medicine Name</th>
                <th scope="col">Unit Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($order_medicines as $om)

            @if($om->order_id == $order->order_id)
            <tr>
                <td>{{$om->med_name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{$om->med_price}}</td>
                <td>{{$om->quantity}}</td>
                <td>{{$om->med_price * $om->quantity}}</td>
            </tr>
            @endif
            @endforeach
                <tfoot>

                <tr>
                    <td colspan="6">&nbsp;</td>
                    <td>Total :</td>
                    <td>{{$order->total}}</td>
                </tr>
                </tfoot>
                </tbody>
            </table>

        </div>

    </div>
    
    </div>
    </div>

    @endforeach



</div>

@endsection