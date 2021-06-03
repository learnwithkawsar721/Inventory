@extends('layouts.dashboard')
@section('title')
    Employee
@endsection
@section('dashboard')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Customer</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('customer.index') }}">Customer</a></li>
                        <li class="breadcrumb-item active">Add Customer</li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <!-- Basic example -->
        <div class="col-xl-6 m-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Customer</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Customer Name *</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Customer Name">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Customer email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Customer email">
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Customer phone *</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Customer phone">
                            @error('phone')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Customer address *</label>
                            <input type="text" name="address" class="form-control" id="address"
                                placeholder="Customer address">
                            @error('address')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                         <div class="form-group">
                            <label for="city">Customer city *</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Customer city">
                            @error('city')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="shopname">Shop Name</label>
                            <input type="text" name="shopname" class="form-control" id="shopname"
                                placeholder="Customer shopname">

                        </div>
                        <div class="form-group">
                            <label for="account_holder">Customer account_holder</label>
                            <input type="text" name="account_holder" class="form-control" id="account_holder"
                                placeholder="Customer account_holder">
                            @error('account_holder')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="account_number">Customer account_number</label>
                            <input type="text" name="account_number" class="form-control" id="account_number"
                                placeholder="Customer account_number">
                            @error('account_number')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bank_name">Customer bank_name</label>
                            <input type="text" name="bank_name" class="form-control" id="bank_name"
                                placeholder="Customer bank_name">
                            @error('bank_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bank_branch">Customer bank_branch</label>
                            <input type="text" name="bank_branch" class="form-control" id="bank_branch"
                                placeholder="Customer bank_branch">
                            @error('bank_branch')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="tenant_photo">Employee photo</label>
                            <br>
                            <img id="tenant_photo_viewer" src="#" />
                            <input name="photo" id="tenant_photo" type="file" class="form-control"
                                accept="image/x-png, image/jpeg" onchange="readURL(this);">
                            @error('photo')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                    </form>
                </div>
                <!-- card-body -->
            </div>
            <!-- card -->
        </div>
        <!-- col-->
    </div>
@endsection
@section('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(150);
                };
                $('#tenant_photo_viewer').removeClass('hidden');
                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
