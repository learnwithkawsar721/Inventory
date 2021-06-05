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
                        <li class="breadcrumb-item active">Show Product</li>
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
                    <h3 class="card-title text-white">Show Product</h3>
                </div>
                <div class="card-body">
                      <img id="tenant_photo_viewer" src="{{ asset('Uploades/product/'.$product->product_img) }}"  />
                        <div class="form-group mt-4">
                            <label for="product_name">Product Name</label>
                            <p>{{ $product->product_name }}</p>
                        </div>
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <p>{{ $product->product_code }}</p>

                        </div>
                        <div class="form-group">
                            <label for="cat_id">Category</label>
                           <p>{{ $product->category->name }}</p>

                        </div>
                        <div class="form-group">
                            <label for="sup_id">Suppliers</label>
                           <p>{{ $product->suppler->name }}</p>

                        </div>
                        <div class="form-group">
                            <label for="godaun">Godaun</label>
                            <p>{{ $product->godaun }}</p>

                        </div>
                        <div class="form-group">
                            <label for="product_route">Product Route</label>
                           <p>{{ $product->product_route }}</p>

                        </div>
                        <div class="form-group">
                            <label for="buy_day">Buying Day</label>
                           <p>{{ $product->buy_day }}</p>

                        </div>
                        <div class="form-group">
                            <label for="expire_day">Expire Day</label>
                            <p>{{ $product->expire_day }}</p>

                        </div>
                        <div class="form-group">
                            <label for="buy_price">Buying Price</label>
                            <p>{{ $product->buy_price }}</p>

                        </div>
                        <div class="form-group">
                            <label for="selling_price">Selling Price</label>
                            <p>{{ $product->selling_price }}</p>

                        </div>

                        <a href="{{ route('product.index') }}"  class="btn btn-purple waves-effect waves-light">Back</a>
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
