@extends('layouts.dash')   
@section('title', 'Store')  

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
                            <h4>List of Restaurants</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Stores</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">List of Restaurants</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                @if(Gate::check('store-add'))
                    @can('store-add')
                    <a type="button"  href ="{{ route('store-add')}}" class="btn btn-primary btn-rounded" ><span class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
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
                        <h4 class="card-title">List Of Restaurants</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Owner</th>
                                        <th>Email</th>
                                        <th>address</th>
                                        <th>location</th>
                                        @if(Gate::check('store-edit'))
                                            @can('store-edit')
                                                <th>Action</th>
                                            @endcan
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stores as $key => $storeValue) 
                                    <tr>
                                        <td>{{ $storeValue->id }}</td>
                                        <td><img class="rounded-circle" width="35" src="{{asset('public/images/stores/'). '/' .$storeValue->image }}" alt="{{ $storeValue->name }}"> </td>
                                        <td>{{ $storeValue->name }}</td>
                                        <td>{{ $storeValue->owner }}</td>
                                        <td>{{ $storeValue->email }}</td>
                                        <td>{{ $storeValue->address }}</td>
                                        <td>{{ $storeValue->location }}</td>
                                        @if(Gate::check('store-edit'))
                                            @can('store-edit')
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('store-edit', ['id' => $storeValue->id]) }}" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="fa fa-pencil"></i></a>
                                                        <a href="{{ url('/dashboard/'.$storeValue->id.'/stores')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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