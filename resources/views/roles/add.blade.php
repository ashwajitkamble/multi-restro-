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
<div style="max-width: 1000px; margin-left: 300px;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Role</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('role-edit', ['id' => isset($role->id) ? Controller::cryptString($role->id, 'e') : '']) }}" method="POST" autocomplete="off">
                @csrf
                <div class="basic-form">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', isset($role->name) ? $role->name : '' ) }}" placeholder="Enter Your Name">
                            @if ($errors->has('name'))
                                <span class="text-danger">
                                    <small>{{ $errors->first('name') }}</small>
                                </span>
                            @endif
                        </div> 
                    </div>
                </div>
                {{-- @can('role-permissions') --}}
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
                {{-- @endcan --}}
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button class="btn btn-dark" type="reset">Reset</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection