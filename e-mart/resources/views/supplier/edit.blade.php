@extends('layout')
@section('content')
<br/><br/>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Supplier Orders</h2>
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
    <form action="{{ route('suppliers.update',$supplier->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <strong>Supplier Order ID:</strong>
                    <input type="text" name="sorderid" value="{{ $supplier->sorderid }}" class="form-control" placeholder="Supplier Order ID" readonly>
                </div>
                <div class="form-group">
                    <strong>Type:</strong>
                    <input type="text" name="type" value="{{ $supplier->type }}" class="form-control" placeholder="Stock Type">
                </div>
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" value="{{ $supplier->date }}" class="form-control" placeholder="Date">
                </div>
                <div class="form-group">
                    <strong>Received Quantity:</strong>
                    <input type="number" name="rcvq" value="{{ $supplier->rcvq }}" class="form-control" placeholder="Received Quantity">
                </div>
                <div class="form-group">
                    <strong>Amount:</strong>
                    <input type="text" name="amount" value="{{ $supplier->amount }}" class="form-control" placeholder="Amount">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <strong>Supplier ID:</strong>
                    <input type="text" name="supid" value="{{ $supplier->supid }}" class="form-control" placeholder="Supplier ID" readonly>
                </div>
                <div class="form-group">
                    <strong>Supplier Name:</strong>
                    <input type="text" name="supname" value="{{ $supplier->supname }}" class="form-control" placeholder="Supplier Name">
                </div>
                <div class="form-group">
                    <strong>Email:</strong>
                    <input type="text" name="email" value="{{ $supplier->email }}" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <strong>Address:</strong>
                    <input type="text" name="address" value="{{ $supplier->address }}" class="form-control" placeholder="Address">
                </div>
                <div class="form-group">
                    <strong>Phone:</strong>
                    <input type="text" name="phone" value="{{ $supplier->phone }}" class="form-control" placeholder="Phone">
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
