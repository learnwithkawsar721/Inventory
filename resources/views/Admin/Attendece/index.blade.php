@extends('layouts.dashboard')
@section('title')
    Attendeces
@endsection
@section('dashboard')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Attendeces</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('attendeces.index') }}">Attendeces</a></li>
                        <li class="breadcrumb-item active">Attendeces page</li>
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
                    <h1 class="card-title">All Attendeces <a href="{{ route('attendeces.create') }}"
                            class="btn btn-sm btn-primary">add New</a></h1>
                </div>
                <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Attendeces</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($attendece as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->employee->name }}</td>
                                    <td>
                                        <img src="{{ asset('Uploades/employees/' . $item->employee->photo) }}" height="50"
                                            width="50" alt="">
                                    </td>
                                    <td>
                                        @if ($item->attendece == 1)
                                            <span class="badge badge-success">Persent</span>
                                        @endif
                                        @if ($item->attendece == 0)
                                            <span class="badge badge-danger">Absent</span>
                                        @endif
                                        @if ($item->attendece == 3)
                                            <span class="badge badge-warning">HolyDay</span>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $item->date }}
                                    </td>

                                    <td>
                                       

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#attendeces-{{ $item->id }}">
                                            Edit
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="attendeces-{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ $item->employee->name }} Attendeces Edit</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('attendeces.update',$item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                           Present <input type="radio" name="attendece"
                                                                value="1" {{ ($item->attendece == 1)?'checked':'' }} required>
                                                            <br>
                                                            Absent <input type="radio" name="attendece"
                                                                value="0" {{ ($item->attendece == 0)?'checked':'' }} required>
                                                                <br>
                                                            HoliDay <input type="radio" name="attendece"
                                                                value="3" {{ ($item->attendece == 3)?'checked':'' }} required>
                                                            <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                                                            <input type="hidden" name="month" value="{{ date('F') }}">
                                                            <input type="hidden" name="year" value="{{ date('Y') }}">
                                                            <input type="hidden" name="user_id" value="{{$item->employee->id }}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save
                                                                changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

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
