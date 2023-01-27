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
                @if(Gate::check('table-add'))
                    @can('table-add')
                        <a type="button"  href="{{route('table-add')}}" class="btn btn-primary btn-rounded" ><i class="fa fa-plus color-primary"></i>
                        </span>Add</a>
                    @endcan
                @endif
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
                                        @if(Gate::check('table-edit'))
                                            @can('table-edit')
                                                <th>Action</th>
                                            @endcan
                                        @endif
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
                                        </td>
                                        @if(Gate::check('table-edit'))
                                            @can('table-edit')
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('table-edit', ['id' => $table->id]) }}" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="fa fa-pencil"></i></a>
                                                    <a href="{{ url('/dashboard/'.$table->id.'/tables')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                </div>												
                                            </td>
                                            @endcan
                                        @endif
                                        
                                        											
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

@endsection