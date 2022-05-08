@extends('layout')
@section('content')
<br/><br/>

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Stock Details </h2>
            </div>
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col">
            <div class="form-group">
                <strong>Stock Type:</strong>
                {{ $post->type }}
            </div>
            <div class="form-group">
                <strong>Stock Name:</strong>
                {{ $post->name }}
            </div>
            <div class="form-group">
                <strong>Amount:</strong>
                {{ $post->amount }}
            </div>
            <div class="form-group">
                <strong>Received Quantity:</strong>
                {{ $post->rcvq }}
            </div>
            <div class="form-group">
                <strong>Remaining Quantity:</strong>
                {{ $post->remq }}
            </div>
            <div class="form-group">
                <strong>Date:</strong>
                {{ $post->date }}
            </div>
            <div class="form-group">
                <strong>Supplier ID:</strong>
                {{ $post->supid }}
            </div>
            <div class="form-group">
                <strong>Supplier Order ID:</strong>
                {{ $post->sorderid }}
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <img src="/uploads/{{ $post->image }}" width="300px" , height="300px">
            </div>
        </div>
    </div>
@endsection
