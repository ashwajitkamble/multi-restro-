@extends('layouts.dash')   
@section('title', 'Menu')  

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
                            <h4>List of Menu</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Menu</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">List of Menu</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a  href="{{ route('menu-add')}} " type="button" class="btn btn-primary btn-rounded"  ><span class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
                </span>Add</a>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Of Menu</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>image</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Restaurant</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Active</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($menus as $key => $menu) 
                                    <tr>
                                        <td>{{ $menu['id'] }}</td>
                                        <td><img class="rounded-circle" width="35" src="{{ $menu['image'] }}" alt=""></td>
                                        <td>{{ $menu['name']}}</td>
                                        <td>@if(!empty($menu['categories']))
                                                @foreach($menu['categories'] as $category)
                                                    @foreach($category as $category)
                                                       <ul><li>{{$category}}</li></ul> 
                                                    @endforeach 
                                                @endforeach 
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>
                                            @if(!empty($menu['stores']))
                                                @foreach($menu['stores'] as $store)
                                                    @foreach($store as $store)
                                                    <ul><li>{{$store}}</li></ul> 
                                                    @endforeach 
                                                @endforeach 
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td>{{ $menu['prize'] }}</td>
                                        <td>{{ $menu['description'] }}</td>
                                        <td>
                                            @if($menu['active'] == 1)
                                                <button type="button" class="btn btn-success btn-sm">Available</button>                             
                                            @else
                                                <button type="button" class="btn btn-warning btn-sm">Not Available</button>
                                            @endif
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('menu-edit', ['id' => $menu['id'] ]) }}" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="fa fa-pencil"></i></a>
                                                <a href="{{ url('/dashboard/'.$menu['id'].'/menus')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
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
@endsection