@extends('layouts.dashboard')
@section('title')
    Expenses
@endsection
@section('dashboard')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Expenses</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}">Expenses</a></li>
                        <li class="breadcrumb-item active">Add Expenses</li>
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
                    <h3 class="card-title text-white">Add Expenses</h3>
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
                    <form action="{{ route('expenses.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="details">details</label>
                            <input type="text" name="details" id="details" class="form-control"
                                placeholder="Expenses details">

                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" step="0.0001" name="amount" id="amount" class="form-control"
                                placeholder="amount">

                        </div>
                        <div class="form-group">
                            <input type="hidden" name="month" value="{{ date('F') }}" id="month" class="form-control"
                                placeholder="month">

                        </div>
                         <div class="form-group">
                            <input type="hidden" name="date" value="{{ date('Y-m-d') }}" id="date" class="form-control"
                                placeholder="date">
                                <input type="hidden" name="year" value="{{ date('Y') }}">

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
