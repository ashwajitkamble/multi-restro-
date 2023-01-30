@extends('layouts.dash')   
@section('title', 'Profile')  

@section('content')
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Profile Information</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Profile</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Name  :- {{ !empty($user) ? ucfirst($user->first_name ." ". $user->last_name ) : '' }}</strong> </p>
                        <p><strong>Email :- {{ !empty($user) ? ucfirst($user->email ) : '' }}</strong> </p>
                        <p><strong>Contact :- {{ !empty($user) ? ucfirst($user->mobile) : '' }}</strong> </p>
                        <p><strong>Store Name  :- {{ !empty($user->storeDetails) ? ucfirst($user->storeDetails->name) : '' }}</strong> </p>
                        <p><strong>Store Address  :- {{ !empty($user->storeDetails) ? ucfirst($user->storeDetails->address) : '' }}</strong> </p>
                        <p><strong>Store Address  :- {{ !empty($user->storeDetails) ? ucfirst($user->storeDetails->email) : '' }}</strong> </p>
                        <p><strong>Store Qwner  :- {{ !empty($user->storeDetails) ? ucfirst($user->storeDetails->owner) : '' }}</strong> </p>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection