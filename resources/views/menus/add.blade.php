@extends('layouts.dash')   
@section('title', 'Menu Add')  

@section('content')
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Menu</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('menu-edit', ['id' => isset($menus->id) ? $menus->id : '']) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
                @csrf
                <div class="basic-form">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="custom-file-label">Select Image</label>
                            <input type="file" class="form-control custom-file-input" name="image" value="{{ old('image', isset($menus->image) ? $menus->image : '' ) }}">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', isset($menus->name) ? $menus->name : '' ) }}" placeholder="Enter Your menus Item">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Price</label>
                            <input type="text" name="prize" class="form-control" value="{{ old('prize', isset($menus->prize) ? $menus->prize : '' ) }}" placeholder="Enter Price">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description', isset($menus->description) ? $menus->description : '' ) }}" placeholder="Enter Description">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Select Restaurant </label>
                            <select class="form-control select_group" id="store_id" name="store_id[]" multiple="multiple">
                                @foreach($stores as $key => $store)
                                    <option value="{{$store->id}}">{{$store->name}}</option>
                                @endforeach                                  
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Select Category </label>
                            <select class="form-control select_group" id="category_id" name="category_id[]" multiple="multiple">
                                @foreach($categories as $key => $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach                                  
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Active</label>
                            <select id="inputState" name="active" class="form-control">
                                <option value="1" @if(Request::get('active') == '1') selected @endif>Yes</option>
                                <option value="0" @if(Request::get('active') == '0') selected @endif>No</option>
                            </select>
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