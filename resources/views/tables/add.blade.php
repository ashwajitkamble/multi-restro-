@extends('layouts.dash')   
@section('title', 'Table')  

@section('content')
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Table</h5>
        </div>
        <div class="modal-body">
            <form action="{{ route('table-edit', ['id' => isset($table->id) ? $table->id : '']) }}" method="POST" autocomplete="off">
                @csrf
                <div class="basic-form">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Select Restaurant </label>
                            <select id="inputState" name="store_id" class="form-control">
                                <option selected value="null">Choose...</option>
                                @foreach($stores as $store)
                                    <option value="{{$store->id}}" @if($table->store_id == $store->id) selected @endif>{{$store->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Table Name </label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', isset($table->name) ? $table->name : '' ) }}" placeholder="Enter Your Table">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Capacity</label>
                            <input type="text" name="capacity" class="form-control" value="{{ old('capacity', isset($table->capacity) ? $table->capacity : '' ) }}" placeholder="Enter Capacity">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Availability </label>
                            <select id="inputState" name="availability" class="form-control">
                                <option value="1" @if(Request::get('avaibility') == '1') selected @endif>Available</option>
                                <option value="0" @if(Request::get('avaibility') == '0') selected @endif>Not-Available</option>
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