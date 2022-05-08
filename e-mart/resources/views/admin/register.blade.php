@extends('layouts.admin')

@section('title')
    Registered Roles
@endsection

@section('content')

<!DOCTYPE html>
<html>
    <head>
        <title>Employee Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    </head>

    <body>
      <div class="col-md-6">
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title"> Registered Roles</h4>
                      
                      <form action="">
                        <div class="input-group rounded">
                            <input type="search" name="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
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


                    </div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class=" text-primary">
                            <th>ID </th>
                            <th>Name </th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Usertype</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </thead>
                          <tbody>
                              @foreach($users as $row)
                            <tr>
                              <td>{{$row->id}}</td>
                              <td>{{$row->name}}</td>
                              <td>{{$row->phone}}</td>
                              <td>{{$row->email}}</td>
                              <td>{{$row->usertype}}</td>
                              <td>
                                  <a href="/role-edit/{{$row->id}}" class="btn btn-success">Edit</a>
                              </td>
                              <td>
                                <form action="/role-delete/{{$row->id}}" method="post">
                                  {{csrf_field()}}
                                  {{method_field('DELETE')}}
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                  </form>
                              </td>
                            </tr>
                            @endforeach
                          
                          </tbody>
                        </table>
                        <span data-href="{{url('usertask')}}" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">
                            Export
                        </span>
                        <script>
                            function exportTasks(_this) {
                                let _url = $(_this).data('href');
                                window.location.href = _url;
                            }
                        </script>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
    </body>
</html>
@endsection

@section('scripts')

@endsection
 