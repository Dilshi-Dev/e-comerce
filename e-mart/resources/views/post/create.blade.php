@extends('layout')
@section('content')
<br/><br/>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Stock</h2>
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
<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
     <div class="row">
        <div class="col">
                <div class="form-group">
                <strong>Type:</strong>
                <input type="text" name="type" class="form-control" placeholder="Type" value="{{ old('type') }}">
                </div>
                <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                <strong>Amount:</strong>
                <input type="text" name="amount" class="form-control" placeholder="Amount" value="{{ old('amount') }}">
                </div>
                <div class="form-group">
                <strong>Received Quantity:</strong>
                <input type="number" name="rcvq" class="form-control" placeholder="0" value="{{ old('rcvq') }}">
                </div>
                <div class="form-group">
                <strong>Remaining Quantity:</strong>
                <input type="number" name="remq" class="form-control" placeholder="0" value="{{ old('remq') }}">
                </div>
        </div>
        <div class="col">
                <div class="form-group">
                <strong>Date:</strong>
                <input type="date" name="date" class="form-control" placeholder="Date" value="{{ old('date') }}">
                </div>
                <div class="form-group">
                <strong>Supplier ID:</strong>
                <input type="text" name="supid" class="form-control" placeholder="Supplier ID" value="{{ old('supid') }}">
                </div>
                <div class="form-group">
                <strong>Supplier Order ID:</strong>
                <input type="text" name="sorderid" class="form-control" placeholder="Supplier Order ID" value="{{ old('sorderid') }}">
                </div>
                <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="image" class="form-control" placeholder="Stock Image">
                </div>
                <br/>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Insert</button>
                <button type="reset" class="btn btn-warning">Clear</button>
                <button type="reset" class="btn btn-danger">Delete</button>
                </div>
        </div>
    </div>
</form>
@endsection
