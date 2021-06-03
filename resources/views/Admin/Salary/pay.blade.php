@extends('layouts.dashboard')
@section('title')
    Salary
@endsection
@section('dashboard')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Salary</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('salary.index') }}">Salary</a></li>
                        <li class="breadcrumb-item active">Salary page</li>
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
                    <h1 class="card-title">All Advanced Salary <span class="pull-right">
                        <a href="{{ route('salary.create') }}" class="btn btn-sm btn-primary">Add New</a>
                    </span></h1>
                    <h3>{{ date("F Y") }}</h3>
                </div>
                <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>

                                <th>Employee Name</th>
                                <th>Photo</th>
                                <th>Salary</th>
                                <th>Month</th>
                                <th>Advanced</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($employee)


                            @foreach ($employee as $item)
                                <tr>

                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img src="{{ asset('Uploades/employees/' . $item->photo) }}" alt="" width="50"
                                            height="50">
                                    </td>
                                    <td>{{ $item->salary }}</td>
                                    <td>{{ date("F",strtotime("-1 month")) }}</td>
                                    <td>{{ $item->advanced }}</td>
                                    <td>
                                       <a href="" class="btn btn-sm btn-primary">Pay Now</a>
                                    </td>
                                </tr>
                            @endforeach
                                 @endif
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
