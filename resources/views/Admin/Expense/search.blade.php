@extends('layouts.dashboard')
@section('title')
    Expenses
@endsection
@section('dashboard')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Today Expenses</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb p-0 m-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}">Expenses</a></li>
                        <li class="breadcrumb-item active">Today Expenses</li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <!-- end page title -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h1>Search for Date</h1>
                    {{ $date }}
                    <form action="{{ route('expenses.search') }}" method="get">

                        <div class="form-group">


                            <input type="date" name="date" class="form-control">

                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Search</button>


                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h1>Search for Yearly</h1>
                    <form action="{{ route('expenses.search') }}" method="GET">
                        <div class="form-group">
                            <input type="text" name="year" class="form-control" placeholder="Year...">

                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Search</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
    @php
    //    echo $date = App\Models\Expenses::where('date',date('d/m/Y'))->get();
    // echo $_GET['date'];
    @endphp
    {{-- @if ($date) --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <h1 style="text-align: center">{{ ($months)?$months:$years }} Total: {{ ($month_amount)?$month_amount:$year_amount }} Taka</h1>
                <div class="card-header">
                    <h1 class="card-title">All Expenses <a href="{{ route('expenses.create') }}"
                            class="btn btn-sm btn-primary">add New</a></h1>
                </div>
                <div class="card-body">
                    <table id="responsive-datatable" class="table table-striped table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Details</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($year)
                                  @foreach ($year as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->details }}</td>
                                    <td>{{ $item->amount }}</td>




                                </tr>
                            @endforeach
                            @endif

                            @foreach ($month as $item)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $item->details }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- @endif --}}





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
