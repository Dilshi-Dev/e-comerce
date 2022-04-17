@extends('layouts.admin')

@section('title')
   Edit Registered
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit-role for Registered user</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="/role-register-update{{$users->id}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-group">
                                    <label >Name</label>
                                    <input type="text" name="name" value="{{$users->name}}" class="form-control" placeholder="Name">
                                 </div>

                                 <div class="form-group">
                                    <label> Phone </label>
                                    <input type="text" name="phone" value="{{$users->phone}}" class="form-control" placeholder="Name">
                                 </div>

                                 <div class="form-group">
                                    <label>Email </label>
                                    <input type="text" name="email" value="{{$users->email}}" class="form-control" placeholder="Name">
                                 </div>



                                 <div class="form-group">
                                     <label >Give Role</label>
                                     <select name="usertype" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="normaluser">Normal User</option>
                                    </select>
                                    </div>



                               <button type="submit" class="btn btn-success">Update</button>
                               <a href="/role-register" class="btn btn-danger">Cancel</a>
                               
                        
                       

                                     
                    </form>
                        </div>
                    </div>
 

                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('scripts')

@endsection
 