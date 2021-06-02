@extends('layouts.dashboard')
@section('title')
    Employee
@endsection
@section('dashboard')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Employee</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('employe.index') }}">Employee</a></li>
                        <li class="breadcrumb-item active">Add Employee</li>
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
                    <h3 class="card-title">Add New Employee</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('employe.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Employee Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Employee Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Employee email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Employee email">
                        </div>
                        <div class="form-group">
                            <label for="address">Employee address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Employee address">
                        </div>
                        <div class="form-group">
                            <label for="phone">Employee phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Employee phone">
                        </div>
                        <div class="form-group">
                            <label for="experience">Employee experience</label>
                            <input type="text" name="experience" class="form-control" id="experience" placeholder="Employee experience">
                        </div>
                        <div class="form-group">
                            <label for="salary">Employee salary</label>
                            <input type="text" name="salary" class="form-control" id="salary" placeholder="Employee salary">
                        </div>
                        <div class="form-group">
                            <label for="vacation">Employee vacation</label>
                            <input type="text" name="vacation" class="form-control" id="vacation" placeholder="Employee vacation">
                        </div>
                        <div class="form-group">
                            <label for="city">Employee city</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Employee city">
                        </div>
                        <div class="form-group">
                            <label for="nid">Employee nid</label>
                            <input type="text" name="nic" class="form-control" id="nid" placeholder="Employee nid">
                        </div>
                        <div class="form-group">
                            <label for="photo">Employee photo</label>
                            <br>
                            <img id="tenant_photo_viewer" src="#" />
                            <input name="photo" id="tenant_photo" type="file" class="form-control" accept="image/x-png, image/jpeg" onchange="readURL(this);">
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
