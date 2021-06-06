@extends('layouts.dashboard')
@section('title')
    Product
@endsection
@section('dashboard')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Import Product</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Product</a></li>
                        <li class="breadcrumb-item active">Import Product page</li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- end page title -->
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('download.product') }}" class="btn btn-danger">Download Xlsx</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                          <div class="form-group">
                            <label for="import_file">Xlsx Import File</label>
                            <input type="file" required name="import_file" id="import_file" class="form-control"
                                placeholder="">

                        </div>
                         <button type="submit" class="btn btn-purple waves-effect waves-light">Import</button>
                    </form>
                </div>
            </div>
        </div>
     </div>
@endsection
