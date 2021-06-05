@extends('layouts.dashboard')
@section('title')
    Product
@endsection
@section('dashboard')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Product</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
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
                <div class="card-header bg-primary ">
                    <h3 class="card-title text-white">Add Product</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" id="product_name" class="form-control"
                                placeholder="Product Name">

                        </div>
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" name="product_code" id="product_code" class="form-control"
                                placeholder="Product Code">

                        </div>
                        <div class="form-group">
                            <label for="cat_id">Category</label>
                            <select name="cat_id" id="cat_id" class="form-control">
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="sup_id">Suppliers</label>
                            <select name="sup_id" id="sup_id" class="form-control">
                                @foreach ($suppliers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="godaun">Godaun</label>
                            <input type="text" name="godaun" id="godaun" class="form-control" placeholder="Product godaun">

                        </div>
                        <div class="form-group">
                            <label for="product_route">Product Route</label>
                            <input type="text" name="product_route" id="product_route" class="form-control"
                                placeholder="Product Route">

                        </div>
                        <div class="form-group">
                            <label for="buy_day">Buying Day</label>
                            <input type="date" name="buy_day" id="buy_day" class="form-control" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="expire_day">Expire Day</label>
                            <input type="date" name="expire_day" id="expire_day" class="form-control" placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="buy_price">Buying Price</label>
                            <input type="number" step="0.0001" name="buy_price" id="buy_price" class="form-control"
                                placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="selling_price">Selling Price</label>
                            <input type="number" step="0.0001" name="selling_price" id="selling_price" class="form-control"
                                placeholder="">

                        </div>
                        <div class="form-group">
                            <label for="tenant_photo">Product photo</label>
                            <br>
                            <img id="tenant_photo_viewer" src="#" />
                            <input name="product_img" id="tenant_photo" type="file" class="form-control"
                                accept="image/x-png, image/jpeg" onchange="readURL(this);">

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
    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;

            }
        @endif

    </script>
@endsection
