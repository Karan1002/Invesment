@extends('agent.master') @section('title','All Policy') @section('header') @parent @endsection @section('content')

<div class="container"><br>
    <div class="row">
        <div class="col-md-6">
            <h1>Policy Details</h1>
        </div>
        <div class="col-md-6 text-right">
            <!-- Button trigger modal Insert -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPolicy">
                Add Policy
            </button>
        </div><br>
    </div>

    @if(Session::get('insert'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Successfully !</strong>
        {{Session::get('insert')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if(Session::get('search'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong>Successfully !</strong>
        {{Session::get('search')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


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
                    <th scope="col">Policy No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Premium</th>
                    <th scope="col" colspan="3">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($data as $i)
                <tr>
                    <td scope="row" align="center"><b>{{$i->id}}</b></td>
                    <td>{{$i->policy_no}}</td>
                    <td>{{$i->name}}</td>
                    <td>{{$i->premium}}</td>
                    <td>
                        <a class="btn btn-info show-modal" data-toggle="modal" data-target="#myshow" data-myid="{{$i->id}}" data-myname="{{$i->name}}" data-mypolicy="{{$i->policy_no}}" data-mypremium="{{$i->premium}}" data-myduedate="{{$i->due_date}}" data-myriskdate="{{$i->risk_date}}" data-mymode="{{$i->mode}}" data-mysumassured="{{$i->sum_assured}}" data-myplanterm="{{$i->plan_term}}" data-myphoneno="{{$i->phone_no}}" data-myaddress="{{$i->address}}">
                            <img src="{{ asset('svg/eye.svg') }}" alt="show" height="30" width="30" />
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-outline-warning" data-myname="{{$i->name}}" data-myid="{{$i->id}}" data-myphone="{{$i->phone_no}}" data-myaddress="{{$i->address}}" data-toggle="modal" data-target="#edit">
                            <img src="{{ asset('svg/edit.svg') }}" alt="update" height="30" width="30" />
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#delete" data-myid="{{$i->id}}">
                            <img src="{{ asset('svg/delete.svg') }}" alt="delete" height="30" width="30">
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div>
    {{$data->links()}}
</div>
<!-- <style>
    .page-item {
        display: inline-block;
        padding: 10px;
    }
</style> -->

<!-- Modal Policy Data Show -->
<div class="modal fade" id="myshow" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Policy Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/pdf" method="POST" target="_blank">
                    @csrf
                    <!-- @foreach($data as $i) -->
                    <input type="hidden" name="id" id="policy_id" value="{{$i->id}}">
                    <dl class="row">

                        <dt class="col-sm-3">Name</dt>
                        <dd class="col-sm-9"><span id="name"></span></dd>

                        <dt class="col-sm-3 text-truncate">Policy Number</dt>
                        <dd class="col-sm-9"><span id="policy"></span></dd>

                        <p id="policy_id"></p>
                        <dt class="col-sm-3 text-truncate">Premium</dt>
                        <dd class="col-sm-9"><span id="premium"></span></dd>

                        <dt class="col-sm-3 text-truncate">Due Date</dt>
                        <dd class="col-sm-9"><span id="duedate"></span></dd>

                        <dt class="col-sm-3 text-truncate">Sum Assured</dt>
                        <dd class="col-sm-9"><span id="sumassured"></span></dd>

                        <dt class="col-sm-3 text-truncate">Mode</dt>
                        <dd class="col-sm-9"><span id="mode"></span></dd>

                        <dt class="col-sm-3 text-truncate">Risk Date</dt>
                        <dd class="col-sm-9"><span id="riskdate"></span></dd>

                        <dt class="col-sm-3 text-truncate">Plan Term</dt>
                        <dd class="col-sm-9"><span id="planterm"></span></dd>

                        <dt class="col-sm-3 text-truncate">Address</dt>
                        <dd class="col-sm-9"><span id="address"></span></dd>

                        <dt class="col-sm-3 text-truncate">Phone no</dt>
                        <dd class="col-sm-9"><span id="phoneno"></span></dd>

                    </dl>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" value="{{$i->id}}" name="btn">Download</button>
                    </div>
                    <!-- @endforeach -->
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Insert -->
<div class="modal fade" id="addPolicy" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">New Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/insert" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Policy Number</label>
                        <input type="number" class="form-control" placeholder="Enter Policy Number" name="Policy_no" required>
                    </div>

                    <div class="form-group">
                        <label>Policy-Holder Name</label>
                        <input type="text" class="form-control" placeholder="Enter Policy-Holder Name" name="Policy_name" required>
                    </div>

                    <div class="form-group">
                        <label>Risk Date</label>
                        <input type="date" class="form-control" name="Risk_Date" required>
                        <span class="input-group date">
                            <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>

                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" placeholder="Enter Phone Number" name="Phone_no" required>
                    </div>

                    <div class="form-group">
                        <label>Sum Assured</label>
                        <input type="number" class="form-control" placeholder="Enter Sum Assured" name="Sum_Assured" required>
                    </div>

                    <div class="form-group">
                        <label>Plan Term</label>
                        <input type="text" class="form-control" placeholder="Enter Plan Term" name="Plan_Term" required>
                    </div>

                    <div class="form-group">
                        <label>Mode</label>
                        <select class="form-control" name="Mode" required>
                            <option selected>Select a Mode</option>
                            <option>MLY</option>
                            <option>QLY</option>
                            <option>HLY</option>
                            <option>YLY</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Premium</label>
                        <input type="number" class="form-control" placeholder="Enter Premium Ammount" name="Premium" required>
                    </div>

                    <div class="form-group">
                        <label>Due Date</label>
                        <input type="text" class="form-control" placeholder="Enter Due Date" name="Due_Date" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" placeholder="Enter Address" name="Address" rows="3" required></textarea>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Update -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/edit" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Policy-Holder Name</label>
                        <input type="hidden" name="id" id="policy_id" value="{{$i->id}}">
                        <input type="text" class="form-control" id="name" name="Policy_name">
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
                <form action="/delete" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="" id="policy_id">
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