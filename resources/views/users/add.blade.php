@extends('layouts.dash')    
@section('title', 'User')
@section('content')   
<?php use App\Http\Controllers\Controller; 
    $reqLabel = '<sup class="text-danger">*</sup>'; 
    $prevRoleId = !empty($user->roles[0]) ? $user->roles[0]->id : NULL;
    $prevStoreId = !empty($user->stores[0]) ? $user->stores[0]->id : NULL;
?> 
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add User</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('user-edit', ['id' => isset($user->id) ? Controller::cryptString($user->id, 'e') : '']) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="basic-form">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>First Name <?php echo $reqLabel; ?></label>
                            <input type="text" name="first_name" class="form-control" value="{{ old('first_name', isset($user->first_name) ? $user->first_name : '' ) }}" placeholder="Enter Your Name">
                            @if ($errors->has('first_name'))
                                <span class="text-danger">
                                    <small>{{ $errors->first('first_name') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label>Last Name <?php echo $reqLabel; ?></label>
                            <input type="text" name="last_name" class="form-control" value="{{ old('last_name', isset($user->last_name) ? $user->last_name : '' ) }}" placeholder="Enter Your Last Name">
                            @if ($errors->has('last_name'))
                                <span class="text-danger">
                                    <small>{{ $errors->first('last_name') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Mobile No. <?php echo $reqLabel; ?></label>
                            <input type="text" class="form-control" placeholder="Enter mobile no." name="mobile" value="{{ old('mobile', isset($user->mobile) ? $user->mobile : '' ) }}">
                            @if ($errors->has('mobile'))
                                <span class="text-danger">
                                    <small>{{ $errors->first('mobile') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Email <?php echo $reqLabel; ?></label>
                            <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{ old('email', isset($user->email) ? $user->email : '' ) }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">
                                    <small>{{ $errors->first('email') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Password <?php echo $reqLabel; ?></label>
                            <input type="password" class="form-control" placeholder="Enter new password" name="password" value="{{ old('password') }}">
                            @if ($errors->has('password'))
                                <span class="text-danger">
                                    <small>{{ $errors->first('password') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Confirm New Password <?php echo $reqLabel; ?></label>
                            <input type="password" class="form-control" placeholder="Enter confirm password" name="confirm_password" value="{{ old('confirm_password') }}">
                            @if ($errors->has('confirm_password'))
                                <span class="text-danger">
                                    <small>{{ $errors->first('confirm_password') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Role <?php echo $reqLabel; ?></label>
                            <select name="role_id" id="" class="form-control">
                                <option value="">Select role</option>
                                @foreach($roles as $id => $name)
                                    <option value="{{ $id }}" @if(old('role_id', $prevRoleId) == $id) selected @endif>{{ $name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('role_id'))
                                <span class="text-danger" role="alert">
                                    <small>{{ $errors->first('role_id') }}</small>
                                </span>
                            @endif
                        </div>
                        <div class="form-group col-md-12">
                            <label for="storeId">Select Store <?php echo $reqLabel; ?></label>
                            <select name="store_id" class="form-control" style="width: 100%;">
                                <option value="">Select Store</option>
                                @foreach($stores as $id => $name)
                                    <option value="{{ $id }}" @if(old('store_id', $prevStoreId) == $id) Selected @endif>{{ $name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('store_id'))
                                <span class="text-danger" role="alert">
                                    <small>{{ $errors->first('store_id') }}</small>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 