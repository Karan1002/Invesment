@extends('admin.master') @section('title','Home') @section('header') @parent @endsection @section('content')

<div class="container"><br>
    <div class="row">
        <div class="col-md-6">
            <h1>Users</h1>
        </div>
    </div>

    @if(Session::get('update'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Successfully !</strong>
        {{Session::get('update')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(Session::get('delete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Successfully !</strong>
        {{Session::get('delete')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr align="center">
                    <th scope="col">#</th>
                    <th scope="col">Agent ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Role</th>
                    <th scope="col">Phone No</th>
                    <th scope="col">Address</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data1 as $i)
                <tr>
                    <td scope="row" align="center"><b>{{$i->id}}</b></td>
                    <td>{{$i->agent_id}}</td>
                    <td>{{$i->name}}</td>
                    <td>{{$i->email}}</td>
                    <td>{{$i->role}}</td>
                    <td>{{$i->phone_no}}</td>
                    <td>{{$i->address}}</td>
                    <td>
                        <a class="btn btn-outline-warning" data-toggle="modal" data-target="#edit" 
                        data-myid="{{$i->id}}" data-myname="{{$i->name}}" data-myagent_id="{{$i->agent_id}}" 
                        data-myaddress="{{$i->address}}" data-myphone="{{$i->phone_no}}">
                            <img src="{{ asset('svg/edit.svg') }}" alt="update" height="40" width="30" />
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-outline-danger" data-toggle="modal" data-target="#delete" data-myid="{{$i->id}}">
                            <img src="{{ asset('svg/delete.svg') }}" alt="delete" height="40" width="30">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div>
    {{$data1->links()}}
</div>

<!-- Update Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update User Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/UserEdit" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" id="user_id" value="{{$i->id}}">
                        <label>Agent ID</label>
                        <input type="number" class="form-control" id="agent_id" name="agent_id" readonly>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" id="phone" name="Phone_no">
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" id="address" name="Address">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/UserDelete" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="" id="user_id">
                    <p class="lead">
                        Are you sure you want to delete this?
                    </p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection @section('footer') @parent @endsection