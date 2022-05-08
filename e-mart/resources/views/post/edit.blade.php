@extends('layout')
@section('content')
<br/><br/>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Stock</h2>
                <br/>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
         <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Type:</strong>
                    <input type="text" name="type" value="{{ $post->type }}" class="form-control" placeholder="Stock Type">
                </div>
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $post->name }}" class="form-control" placeholder="Stock Name">
                </div>
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="text" name="amount" value="{{ $post->amount }}" class="form-control" placeholder="Amount">
                </div>
                <div class="form-group">
                    <strong>Received Quantity:</strong>
                    <input type="number" name="rcvq" value="{{ $post->rcvq }}" class="form-control" placeholder="Received Quantity">
                </div>
                <div class="form-group">
                    <strong>Remaining Quantity:</strong>
                    <input type="number" name="remq" value="{{ $post->remq }}" class="form-control" placeholder="Remaining Quantity">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" value="{{ $post->date }}" class="form-control" placeholder="Date">
                </div>
                <div class="form-group">
                    <strong>Supplier ID:</strong>
                    <input type="text" name="supid" value="{{ $post->supid }}" class="form-control" placeholder="Supplier ID" readonly>
                </div>
                <div class="form-group">
                    <strong>Supplier Order ID:</strong>
                    <input type="text" name="sorderid" value="{{ $post->sorderid }}" class="form-control" placeholder="Supplier Order ID" readonly>
                </div>
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="Post Image">
                    <br/>
                    <img src="/uploads/{{ $post->image }}" width="100px" , height="100px">
                </div>
            </div>
            <br/>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-success">Update</button>
              <button type="reset" class="btn btn-warning">Clear</button>
              <button type="reset" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </form>
@endsection
