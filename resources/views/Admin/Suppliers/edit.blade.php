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
                        <li class="breadcrumb-item active">Edit Suppliers</li>
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
                    <h3 class="card-title">Edit Suppliers</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('suppliers.update',$suppliers->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">Suppliers Name</label>
                            <input type="text" value="{{ $suppliers->name }}" name="name" class="form-control" id="name" placeholder="Suppliers Name">
                            @error('name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Suppliers email</label>
                            <input type="email" name="email" value="{{ $suppliers->email }}" class="form-control" id="email" placeholder="Suppliers email">
                            @error('email')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Suppliers phone</label>
                            <input type="text" name="phone" value="{{ $suppliers->phone }}" class="form-control" id="phone" placeholder="Suppliers phone">
                            @error('phone')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Suppliers address</label>
                            <input type="text" name="address" value="{{ $suppliers->address }}" class="form-control" id="address" placeholder="Suppliers address">
                            @error('address')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="city">Suppliers city</label>
                            <input type="text" name="city" value="{{ $suppliers->city }}" class="form-control" id="city" placeholder="Suppliers city">
                            @error('city')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Suppliers Type</label>
                           <select name="type" id="type" class="form-control">
                               <option value="{{ $suppliers->type }}">{{ $suppliers->type }}</option>
                               <option value="Distributor">Distributor</option>
                               <option value="wholeseller">wholeseller</option>
                               <option value="Brochure">Brochure</option>
                           </select>
                            @error('type')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="shopname">Shop Name</label>
                            <input type="text" name="shopname" value="{{ $suppliers->shopname }}" class="form-control" id="shopname"
                                placeholder="shopname">

                        </div>
                        <div class="form-group">
                            <label for="account_holder">account_holder</label>
                            <input type="text" name="account_holder" value="{{ $suppliers->account_holder }}" class="form-control" id="account_holder"
                                placeholder="account_holder">
                            @error('account_holder')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="account_number">account_number</label>
                            <input type="text" name="account_number" value="{{ $suppliers->account_number }}" class="form-control" id="account_number"
                                placeholder="account_number">
                            @error('account_number')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bank_name">bank_name</label>
                            <input type="text" name="bank_name" value="{{ $suppliers->bank_name }}" class="form-control" id="bank_name"
                                placeholder="bank_name">
                            @error('bank_name')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bank_branch">bank_branch</label>
                            <input type="text" name="bank_branch" value="{{ $suppliers->bank_branch }}" class="form-control" id="bank_branch"
                                placeholder="bank_branch">
                            @error('bank_branch')
                                <strong class="text-danger">{{ $message }}</strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tenant_photo">Suppliers photo</label>
                            <br>
                            <img id="tenant_photo_viewer" src="{{ asset('Uploades/suppliers/'.$suppliers->photo) }}" />
                            <input name="photo" id="tenant_photo" type="file" class="form-control" accept="image/x-png, image/jpeg" onchange="readURL(this);">
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
        reader.onload = function (e) {
          $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(150);
        };
        $('#tenant_photo_viewer').removeClass('hidden');
        reader.readAsDataURL(input.files[0]);
      }
    }
    </script>
@endsection
