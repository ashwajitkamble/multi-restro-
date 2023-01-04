@extends('layouts.dash')   
@section('title', 'Table')  

@section('content')

<!--*****Content body start****-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>List of Tables</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Tables</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">List of Tables</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-primary btn-rounded"  data-toggle="modal" data-target="#user-add"><span class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
                </span>Add</button>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Of Tables</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Restaurant</th>
                                        <th>Capacity</th>
                                        <th>Availability</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tables as $key => $table) 
                                    <tr>
                                        <td>{{ $table->id }}</td>
                                        <td>{{ $table->name }}</td>
                                        <td>{{ $table->stores->name }}</td>
                                        <td>{{ $table->capacity }}</td>
                                        <td>
                                            @if($table->availability == 1)
                                                <button type="button" class="btn btn-success btn-sm">Available</button>                             
                                            @else
                                                <button type="button" class="btn btn-warning btn-sm">Not Available</button>
                                            @endif
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('table-edit', ['id' => $table->id]) }}" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="fa fa-pencil"></i></a>
                                                <a href="{{ url('/dashboard/'.$table->id.'/tables')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                            </div>												
                                        </td>
                                        											
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--*****Content body End****-->

<!-- model center start -->
<div class="modal fade" id="user-add">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Tables</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('table-edit') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="basic-form">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Select Restaurant </label>
                                <select id="inputState" name="store_id" class="form-control">
                                    <option selected value="null">Choose...</option>
                                    @foreach($stores as $store)
                                        <option value="{{$store->id}}" @if(Request::get('store_id') == $store->id) selected @endif>{{$store->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Table Name </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Your Restaurant">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Capacity</label>
                                <input type="text" name="capacity" class="form-control" placeholder="Enter Capacity">
                            </div>
                            <div class="form-group col-md-12">
                                <label>Availability </label>
                                <select id="inputState" name="availability" class="form-control">
                                    <option selected>Choose...</option>
                                    <option value="1" @if(Request::get('avaibility') == '1') selected @endif>Available</option>
                                    <option value="0" @if(Request::get('avaibility') == '0') selected @endif>Not-Available</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</div>
<!-- model center End -->	

@endsection