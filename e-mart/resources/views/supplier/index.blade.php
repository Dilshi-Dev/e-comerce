@extends('layout')
@section('content')
<br/><br/>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Supplier Order Management</h2>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <br/>

        <div class="row">
            <div class="col">
            </div>
            <div class="col">
                <form action="" >
                <div class="input-group rounded">
                    <input type="search" name="search" class="form-control rounded"  placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <button class="btn btn-sm btn-primary" type="submit">Search</button>
                </div>
            </form>
            </div>
        </div>
        <br/>

    <table class="table table-bordered">
        <tr>
            <th>Order ID</th>
            <th>Supplier Order ID</th>
            <th>Type</th>
            <th>Received Date</th>
            <th>Received Quanitity (kg/l)</th>
            <th>Amount (Rs.)</th>
            <th>Supplier ID</th>
            <th>Supplier Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        @foreach ($records as $record)
        <tr>
            <td>{{ ++$i }}</td>
            {{-- <td><img src="/uploads/{{ $record->image }}" width="100px"></td> --}}
            <td>{{ $record->sorderid }}</td>
            <td>{{ $record->type }}</td>
            <td>{{ $record->date }}</td>
            <td>{{ $record->rcvq }}</td>
            <td>{{ $record->amount }}</td>
            <td>{{ $record->supid }}</td>
            <td>{{ $record->supname }}</td>
            <td>{{ $record->email }}</td>
            <td>{{ $record->address }}</td>
            <td>{{ $record->phone }}</td>
            <td>
         <form action="{{ route('suppliers.edit',$record->id) }}"> <button class="btn btn-sm btn-info" style="width:100px"> Edit</button> </form>
                <form action="{{ route('suppliers.destroy',$record->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" style="width:100px">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <span data-href="{{url('tasks')}}" id="export" class="btn btn-primary btn-sm" onclick="exportTasks(event.target);">
        Export
    </span>
    <script>
        function exportTasks(_this) {
            let _url = $(_this).data('href');
            window.location.href = _url;
        }

    </script>

    {!! $records->links() !!}
@endsection
