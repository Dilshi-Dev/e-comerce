@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Order Management </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>
    <!-- @if ($errors -> any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $errors)
                <li>{{$errors}}</li>
                @endforeach
            </ul>
        </div>
    @endif -->




    <div class="container mt-5">
        <form action="{{url('order-update')}}" method="POST">
       @csrf
          <input type="hidden" name="id" value="{{$order->id}}">
            <div class="form-grp">
                <label>Date</label>
                <input type="text" name="date" class="form-control" value=" {{$order->date}}">
            </div>

            <br>
            <div class="form-grp">
                <label>Order Type</label>
                <input type="text" name="ordertypr" class="form-control" value="{{$order->ordertypr}}">
            </div>

            <div class="form-grp">
                <label>Transaction Code</label>
                <input type="text" name="transactioncode" class="form-control" value="{{$order->transactioncode}}">
            </div>

            <br>
            <div class="form-grp">
                <label>Price per/kg</label>
                <input type="text" name="priceperkg" class="form-control" value="{{$order->priceperkg}}" >
            </div>

            <br>
            <div class="form-grp">
            <label>Quantity</label>
            <input type="text" name="quantity" class="form-control" value=" {{$order->quantity}}" >
           
            <br>
            <div class="form-grp">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="{{$order->price}}" >
            <br><br>    
            </div>
                <button type="submit" class="btn btn-primary form-control">Save</button>
        </form>
     </div>


               


    </body>
</html>

@endsection

@section('scripts')

@endsection
