@extends('layouts.dash')   
@section('title', 'Role List')
@section('content')  
<?php use App\Http\Controllers\Controller; ?>
<!--*****Content body start****-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Role</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Role</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">List of Role</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            {{-- @can('user-add') --}}
                <div class="col-md-2">
                    <a  href="{{ route('role-add')}} " type="button" class="btn btn-primary btn-rounded"><span class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
                    </span>Add</a>
                </div>
            {{-- @endcan --}}
            
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Of Role</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Name</th>
                                        {{-- @if(Gate::check('user-edit') || Gate::check('user-delete')) --}}
                                            <th>Action</th>
                                        {{-- @endif --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($allroles) && count($allroles) > 0)
                                        <?php  $count = $allroles->firstItem(); ?>
                                        @foreach($allroles as $id => $role)
                                            @php $encyId = Controller::cryptString($role->id, 'e') @endphp
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $role->name }}</td>
                                                {{-- @if(Gate::check('user-edit') || Gate::check('user-delete')) --}}
                                                    <td>
                                                        <div class="btn-group">
                                                            {{-- @can('user-edit') --}}
                                                                <a href="{{ route('role-edit', ['id' => $encyId]) }}" class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="fa fa-pencil"></i>edit</a>
                                                            {{-- @endcan
                                                            @can('user-delete')  --}}
                                                                <a href="{{ url('/dashboard/'.$role->id.'/roles')}}" class="btn btn-primary shadow btn-xs sharp mr-1 " onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i>delete</a>
                                                            {{-- @endcan --}}
                                                        </div>
                                                    </td>
                                                {{-- @endif   --}}
                                            </tr> 
                                        @endforeach
                                    @endif 
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
