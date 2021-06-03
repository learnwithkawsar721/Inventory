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
                        <li class="breadcrumb-item active">Suppliers page</li>
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
                    <h1 class="card-title">Total Suppliers (<strong>{{ $count }}</strong>)</h1>
                </div>
                <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Type</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>
                                        <img src="{{ asset('Uploades/suppliers/' . $item->photo) }}" alt="" width="50"
                                            height="50">
                                    </td>
                                    <td>
                                        <a href="{{ route('suppliers.edit', $item->id) }}"
                                            class="btn btn-sm btn-info">Edit</a>
                                        <button value="{{ route('suppliers.delete', $item->id) }}"
                                            class="btn btn-sm btn-danger delete_btn">Delete</button>
                                        <a href="{{ route('suppliers.show', $item->id) }}"
                                            class="btn btn-sm btn-primary">Show</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>






@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('.delete_btn').click(function() {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                         var url = $(this).val();
                         window.location.href = url;
                    }
                })
            })
        });

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
