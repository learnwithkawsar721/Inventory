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
                        <li class="breadcrumb-item active">Edit Customer</li>
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
                    <h3 class="card-title">Edit Customer</h3>
                </div>
                <div class="card-body">

                        <div class="form-group">
                            <label for="name">Customer Name *</label>
                            <p>{{ $customer->name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Customer email</label>
                           <p>{{ $customer->email }}</p>
                        </div>

                        <div class="form-group">
                            <label for="phone">Customer phone *</label>
                            <p>{{ $customer->phone }}</p>
                        </div>
                        <div class="form-group">
                            <label for="address">Customer address *</label>
                            <p>{{ $customer->address }}</p>
                        </div>
                         <div class="form-group">
                            <label for="city">Customer city *</label>
                            <p>{{ $customer->city }}</p>
                        </div>
                        <div class="form-group">
                            <label for="shopname">Shop Name</label>
                           <p>{{ $customer->shopname }}</p>
                        </div>
                        <div class="form-group">
                            <label for="account_holder">Customer account_holder</label>
                            <p>{{ $customer->account_holder }}</p>
                        </div>
                        <div class="form-group">
                            <label for="account_number">Customer account_number</label>
                           <p>{{ $customer->account_number }}</p>
                        </div>
                        <div class="form-group">
                            <label for="bank_name">Customer bank_name</label>
                          <p>{{ $customer->bank_name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="bank_branch">Customer bank_branch</label>
                            <p>{{ $customer->bank_branch }}</p>
                        </div>

                        <div class="form-group">
                            <label for="tenant_photo">Employee photo</label>
                            <br>
                            <img id="tenant_photo_viewer" src="{{ asset('Uploades/customer/'.$customer->photo) }}" />

                        </div>

                        <a href="{{ route('customer.index') }}" class="btn btn-purple waves-effect waves-light">Back</a>
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
