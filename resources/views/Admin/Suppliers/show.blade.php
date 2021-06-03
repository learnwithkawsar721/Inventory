@extends('layouts.dashboard')
@section('title')
    Suppliers
@endsection
@section('dashboard')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Suppliers</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
                        <li class="breadcrumb-item active">Show Suppliers</li>
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
                    <h3 class="card-title">Show Suppliers</h3>
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label for="name">Suppliers Name</label>
                        <p>{{ $suppliers->name }}</p>

                    </div>
                    <div class="form-group">
                        <label for="email">Suppliers email</label>
                        <p>{{ $suppliers->email }}</p>

                    </div>
                    <div class="form-group">
                        <label for="phone">Suppliers phone</label>
                        <p>{{ $suppliers->phone }}</p>

                    </div>
                    <div class="form-group">
                        <label for="address">Suppliers address</label>
                        <p>{{ $suppliers->address }}</p>

                    </div>

                    <div class="form-group">
                        <label for="city">Suppliers city</label>
                        <p>{{ $suppliers->city }}</p>

                    </div>
                    <div class="form-group">
                        <label for="type">Suppliers Type</label>
                        <p>{{ $suppliers->type }}</p>

                    </div>
                    <div class="form-group">
                        <label for="shopname">Shop Name</label>
                        <p>{{ $suppliers->shopname }}</p>


                    </div>
                    <div class="form-group">
                        <label for="account_holder">account_holder</label>
                        <p>{{ $suppliers->account_holder }}</p>

                    </div>
                    <div class="form-group">
                        <label for="account_number">account_number</label>
                        <p>{{ $suppliers->account_number }}</p>

                    </div>
                    <div class="form-group">
                        <label for="bank_name">bank_name</label>
                        <p>{{ $suppliers->bank_name }}</p>

                    </div>
                    <div class="form-group">
                        <label for="bank_branch">bank_branch</label>
                        <p>{{ $suppliers->bank_branch }}</p>
                    </div>
                    <div class="form-group">
                        <label for="tenant_photo">Suppliers photo</label>
                        <br>
                        <img id="tenant_photo_viewer" src="{{ asset('Uploades/suppliers/' . $suppliers->photo) }}" />

                    </div>

                    <a href="{{ route('suppliers.index') }}" class="btn btn-purple waves-effect waves-light">Back</a>

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
