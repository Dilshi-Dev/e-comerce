@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Delivery details</title>
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
        <form action="{{url('delivery-save')}}" method="POST">
       @csrf
            <div class="form-grp">
                <label>Trackingno</label>
                <input type="text" name="trackingno" class="form-control" value="{{old('trackingno')}}">
            </div>

            <br>
            <div class="form-grp">
                <label>Orderplacement</label>
                <input type="text" name="orderplacement" class="form-control" value="{{old('orderplacement')}}"> 
            </div>

            <div class="form-grp">
                <label>Vehicleno</label>
                <input type="text" name="vehicleno" class="form-control" value="{{old('vehicleno')}}">
            </div>

            <br>
            <div class="form-grp">
                <label>Deliverycharge</label>
                <input type="text" name="deliverycharge" class="form-control" value="{{old('deliverycharge')}}" >
            </div>

            <br>
            <div class="form-grp">
            <label>Receivers Phone number</label>
            <input type="text" name="receiversnumber" class="form-control"  value="{{old('receiversnumber')}}">
            <br><br>    
            </div>
                <button type="submit" class="btn btn-primary form-control">Save</button>
        </form>
        

        <br>
        <br>
        <form action="">
            <div class="input-group rounded">
                <input type="search" name="search" class="form-control rounded" value="{{$search}}" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
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
              <table class="table">
                 <thead>
                 <tr>
                        <th>Tracking Number</th>
                        <th>Order Placement</th>
                        <th>Vehicle Number</th>
                        <th>Delivery Charge</th>
                        <th>Receiver Contact</th>
                        <th>Action</th>
                      </tr>
                </thead>
                 <tbody>
   
                        @foreach($deliverydetails as $deliverydetail)
                        <tr>
                            <td>{{$deliverydetail->trackingno}}</td>
                            <td>{{$deliverydetail->orderplacement}}</td>
                            <td>{{$deliverydetail->vehicleno}}</td>
                            <td>{{$deliverydetail->deliverycharge}}</td>
                            <td>{{$deliverydetail->receiversnumber}}</td>
                            
                             

                            <td>
                                <a href="{{url('delivery-edit')}}/{{$deliverydetail->id}}" class="btn btn-warning">Edit</a>
                                <a href="{{url('delivery-delete')}}/{{$deliverydetail->id}}" class="btn btn-danger">Delete</a>
                            </td>

                        </tr>
                       @endforeach
                    

                        
                        
                </tbody>
            </table>
            <span data-href="{{url('tasks')}}" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">
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
