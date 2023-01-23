@extends('layouts.dash')   
@section('title', 'Store')  

@section('content')
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Restaurant</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('store-edit', ['id' => isset($store->id) ? $store->id : '']) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="basic-form">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Restaurant Name </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', isset($store->name) ? $store->name : '' ) }}" placeholder="Enter Your Restaurant">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="custom-file-label">Restaurant Logo </label>
                            <input type="file" name="image" class="form-control custom-file-input" value="{{ old('image', isset($store->image) ? $store->image : '' ) }}">
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