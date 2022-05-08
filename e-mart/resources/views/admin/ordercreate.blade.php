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
    @if ($errors -> any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $errors)
                <li>{{$errors}}</li>
                @endforeach
            </ul>
        </div>
    @endif




    <div class="container mt-5">
        <form action="{{url('order-save')}}" method="POST">
       @csrf
            <div class="form-grp">
                <label>Date</label>
                <input type="text" name="date" class="form-control" value="{{old('date')}}">
            </div>

            <br>
            <div class="form-grp">
                <label>Order Type</label>
                <input type="text" name="ordertypr" class="form-control" value="{{old('ordertypr')}}">
            </div>

            <div class="form-grp">
                <label>Transaction Code</label>
                <input type="text" name="transactioncode" class="form-control" value="{{old('transactioncode')}}">
            </div>

            <br>
            <div class="form-grp">
                <label>Price per/kg</label>
                <input type="text" name="priceperkg" class="form-control" value="{{old('priceperkg')}}" >
            </div>

            <br>
            <div class="form-grp">
            <label>Quantity</label>
            <input type="text" name="quantity" class="form-control" value="{{old('quantity')}}">
           
            <br>
            <div class="form-grp">
            <label>Price</label>
            <input type="text" name="price" class="form-control" value="{{old('price')}}" >
            <br><br>    
            </div>
                <button type="submit" class="btn btn-primary form-control">Save</button>
        </form>

        <br><br><br>


            <form action="">
                <div class="input-group rounded">
                    <input type="search" name="search" class="form-control" value="{{$search}}" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                </div>
                <button class="btn btn-primary">Search</button>
             </form>



              @if(Session::has('message'))
              <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                <strong>{{Session::get('message')}}</strong> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>


              @endif


             <table class="table table-bordered table-green">
                 <thead>
                      <tr>
                        <th>Date</th>
                        <th>Order Type</th>
                        <th>Transaction Code</th>
                        <th>Price Per Kg</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                </thead>
                 <tbody>
   
                         @foreach($order as $order)
                        <tr>
                            
                            <td>{{$order->date}}</td>
                            <td>{{$order->ordertypr}}</td>
                            <td>{{$order->transactioncode}}</td>
                            <td>{{$order->priceperkg}}</td> 
                            <td>{{$order->quantity}}</td> 
                            <td>{{$order->price}}</td> 
                            <td>
                                <a href="{{url('order-edit')}}/{{$order->id}}" class="btn btn-warning">Edit</a>
                                <a href="{{url('order-delete')}}/{{$order->id}}" class="btn btn-danger">Delete</a> 

                        </tr>
                       @endforeach 
                  

                        
                        
                </tbody>
            </table>
            <span data-href="{{url('ordertask')}}" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">
                Export
            </span>
            <script>
                function exportTasks(_this) {
                    let _url = $(_this).data('href');
                    window.location.href = _url;
                }
            </script>


          </div>


               


    </body>
</html>

@endsection

@section('scripts')

@endsection
