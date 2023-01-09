@extends('layouts.dash')   
@section('title', 'Category')  

@section('content')
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Category</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('category-edit', ['id' => isset($category->id) ? $category->id : '']) }}" method="POST" autocomplete="off">
                @csrf
                <div class="basic-form">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Category Name </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', isset($category->name) ? $category->name : '' ) }}" placeholder="Enter Your Caategory">
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