@extends('layouts.dash')    
@section('title', 'Role')
@section('content')   
<?php 
    use App\Http\Controllers\Controller;
    $reqLabel = '<sup class="text-danger">*</sup>';
    if(!empty($role)){
        $permisionArr = json_decode($role->permissions, true);
    }
?> 
<style>
    .list-group-item {padding: 0.3rem 0.35rem;}
</style>

    <div class="page-header">
        <h3 class="page-title"> Role </h3>
        <nav aria-label="breadcrumb">
            <a href="{{ route('role') }}"><button type="button" class="btn btn-primary custom-btn">Back</button></a>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card"></div>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                   <form role="form"  class="form-horizontal form-label-left" action="{{ route('role-edit', ['id' => isset($role->id) ? Controller::cryptString($role->id, 'e') : '']) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                        <div class="row clearfix">
                            <div class="form-group col-sm-3">
                                <label for="">Name <?php echo $reqLabel; ?></label>
                                <input type="text" class="form-control" placeholder="Enter name" name="name" value="{{ old('name', isset($role->name) ? $role->name : '' ) }}">
                                @if ($errors->has('name'))
                                    <span class="text-danger">
                                        <small>{{ $errors->first('name') }}</small>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @can('role-permissions')
                            <div class="row clearfix">
                                <div class="col-md-12">
                                    @foreach($modules as $module)
                                        <div class="box box-default noborder">
                                            <div class="box-body" style="padding-top: unset;">
                                                <h5><b>{{ $module->name }} </b></h5>
                                                @foreach($module->submodules->chunk(4) as $modchunk)
                                                    <div class="row clearfix" style="margin-bottom:6px;">
                                                        @foreach($modchunk as $submodule)
                                                            <div class="col-md-3 subdiv">
                                                                <li class="list-group-item bg-blue text-white">
                                                                    <div class="checkbox">
                                                                        <label>
                                                                            <input type="checkbox" class="parentCheckBox" onclick="checkAllChild(this);" value=""> {{ $submodule->name }}
                                                                        </label>
                                                                    </div>
                                                                </li>
                                                                @if(!empty($submodule->methods) && count($submodule->methods) > 0)
                                                                    <li class="list-group-item">
                                                                        <ul class="list-group">
                                                                            @foreach($submodule->methods as $method)
                                                                                <li class="list-group-item">
                                                                                    <div class="checkbox">
                                                                                        <label>
                                                                                            <input type="checkbox" class="childCheckBox" onclick="checkForParent(this);" name="checked[{{ $method->route_name }}]" value="" @if(!empty($role)) @if(array_key_exists($method->route_name,$permisionArr)) checked @endif @endif> {{ $method->display_name }}
                                                                                        </label>
                                                                                    </div>
                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <br>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endcan
                        <div class="row clearfix">    
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light" type="reset">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection