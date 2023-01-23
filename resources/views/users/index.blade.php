@extends('layouts.dash')   
@section('title', 'User List')
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
                            <h4>List of Users</h4>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">User</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">List of User</a></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <a  href="{{ route('user-add')}} " type="button" class="btn btn-primary btn-rounded"  ><span class="btn-icon-left text-primary"><i class="fa fa-plus color-primary"></i>
                </span>Add</a>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Of User</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th width="10%">Sr. No.</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Store</th>
                                        <th>Role</th>
                                        @if(Gate::check('user-edit') || Gate::check('user-delete'))
                                            <th width="10%">Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(!empty($users) && count($users) > 0)
                                        <?php  $count = $users->firstItem(); ?>
                                        @foreach($users as $key => $user)
                                            <?php 
                                                $roleName = '';
                                                $encyId = Controller::cryptString($user->id, 'e'); 
                                                if(!empty($user->roles) && count($user->roles) > 0){
                                                    $roleName = $user->roles[0]->name;
                                                } 
                                            ?>
                                            <tr>
                                                <td>{{ $count++ }}</td>
                                                <td>{{ $user->first_name." ".$user->last_name }}</td>
                                                <td>{{ $user->mobile }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if(!empty($user->store_id))
                                                        @foreach ($store as $key => $item)
                                                            @if($item->id == $user->store_id)
                                                                {{$item->name}}                                                                
                                                            @endif
                                                        @endforeach
                                                        
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>{{ $roleName }}</td>
                                                @if(Gate::check('user-edit') || Gate::check('user-delete'))
                                                    <td>
                                                        <div class="btn-group">
                                                            @can('user-edit')
                                                                <a href="{{ route('user-edit', ['id' => $encyId]) }}"class="btn btn-primary shadow btn-xs sharp mr-1 "><i class="fa fa-pencil"></i></a>  
                                                                
                                                            @endcan
                                                            @can('user-delete')   
                                                                <a href="{{ url('/dashboard/'.$user->id.'/users')}}" onclick="return confirm('Are you sure?')" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                                            @endcan
                                                        </div>
                                                    </td>
                                                @endif  
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
