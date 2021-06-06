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
                        <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}">Attendeces</a></li>
                        <li class="breadcrumb-item active">Add Attendeces</li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header text-center">
                    <h1 class="card-title" style="font-size: 22px;color:green;">Today {{ date('d/m/Y') }}</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Attendeces</th>
                            </tr>
                        </thead>
                        <form action="{{ route('attendeces.store') }}" method="POST">
                            @csrf
                        <tbody>
                            @foreach ($employee as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img src="{{ asset('Uploades/employees/'.$item->photo) }}" height="50" width="50" alt="">
                                    </td>
                                    <td>
                                        <input type="radio" name="attendece[{{ $item->id }}]" value="1" required >Present

                                        <input type="radio" name="attendece[{{ $item->id }}]" value="0" required >Absent
                                        <input type="radio" name="attendece[{{ $item->id }}]" value="3" required >HoliDay
                                        <input type="hidden" name="date" value="{{ date('Y-m-d') }}">
                                        <input type="hidden" name="month" value="{{ date('F') }}">
                                        <input type="hidden" name="year" value="{{ date('Y') }}">
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                    <button type="submit" class="btn btn-success">Take Attendece</button>
                    </form>
                </div>
            </div>
        </div>
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
