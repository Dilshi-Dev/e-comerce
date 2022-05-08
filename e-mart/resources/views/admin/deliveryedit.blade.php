@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Employee Registration</title>
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
        <form action="{{url('delivery-update')}}" method="POST">
       @csrf
            <input type="hidden" name="id" value="{{$deliverydetail->id}}">
            <div class="form-grp">
                <label>trackingno</label>
                <input type="text" name="trackingno" class="form-control" value="{{$deliverydetail->trackingno}}">
            </div>

            <br>
            <div class="form-grp">
                <label>orderplacement</label>
                
                <input type="text" name="orderplacement" class="form-control" value="{{$deliverydetail->orderplacement}}">
            </div>

            <div class="form-grp">
                <label>vehicleno</label>
                <input type="text" name="vehicleno" class="form-control" value="{{$deliverydetail->vehicleno}}">

            </div>

            <br>
            <div class="form-grp">
                <label>deliverycharge</label>
                <input type="text" name="deliverycharge" class="form-control" value="{{$deliverydetail->deliverycharge}}">

            </div>

            <br>
            <div class="form-grp">
            <label>receiversnumber</label>
            <input type="text" name="receiversnumber" class="form-control" value="{{$deliverydetail->receiversnumber}}">

            <br><br>    
            </div>
                <button type="submit" class="btn btn-primary form-control">Save</button>
        </form>

    </div>



</body>
</html>
   

   
























<!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD DELIVERY DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      

        <form action="/save-deliverydetails" method="post">
          {{csrf_field()}}
          <div class="modal-body">

              <div class="form-group">
                <label for="trackingno" class="col-form-label">Trackingno:</label>
                <input type="text" name="trackingno" class="form-control" id="trackingno">
              </div>

              <div class="form-group">
                <label for="orderplacement" class="col-form-label">Orderplacement:</label>
                <input type="text" name="orderplacement" class="form-control" id="orderplacement">
              </div>

              <div class="form-group">
                <label for="vehicleno" class="col-form-label">Vehicleno:</label>
                <input type="text" name="vehicleno" class="form-control" id="vehicleno">
              </div>

          

              <div class="form-group">
                <label for="deliverycharge" class="col-form-label">Deliverycharge:</label>
                <input type="text" name="deliverycharge" class="form-control" id="deliverycharge">
              </div>

              <div class="form-group">
                <label for="receiversnumber" class="col-form-label">Receivers Phone number:</label>
                <input type="text" name="receiversnumber" class="form-control" id="receiversnumber">
              </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" data-dismiss="modal">Save</button>
        </div>
        </form>
    </div>
  </div>
</div>

<div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Delivery</h5>
                <h4 class="card-title"> Delivery Details
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">ADD</button>

                </h4>

              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>rackingno</th>
                      <th>Country</th>
                      <th>City</th>
                      <th >Salary </th>
                      <th >Edit </th>
                      <th >Delete </th>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Dakota Rice</td>
                        <td>Niger</td>
                        <td>Oud-Turnhout</td>
                        <td>$36,73</td>
                        <td>
                          <a href="#" class="btn btn-success">Edit</a>
                        </td>

                        <td>
                          <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

@endsection

@section('scripts')

@endsection
