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
                        <li class="breadcrumb-item active">Employee page</li>
                    </ol>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">

        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title text-white">Employee Information</h3>
                </div>
                <div class="card-body">
                   <ul>
                       <li style="font-size: 16px; font-width:700;">Employee Name: <p>{{ $employe->name }}</p></li>
                       <li style="font-size: 16px; font-width:700;">Employee Email: <p>{{ $employe->email }}</p></li>
                       <li style="font-size: 16px; font-width:700;">Employee Phone: <p>{{ $employe->phone }}</p></li>
                       <li style="font-size: 16px; font-width:700;">Employee Address: <p>{{ $employe->address }}</p></li>
                       <li style="font-size: 16px; font-width:700;">Employee Experience: <p>{{ $employe->experience }}</p></li>
                       <li style="font-size: 16px; font-width:700;">Employee salary: <p>{{ $employe->salary }}</p></li>
                       <li style="font-size: 16px; font-width:700;">Employee vacation: <p>{{ $employe->vacation }}</p></li>
                       <li style="font-size: 16px; font-width:700;">Employee city: <p>{{ $employe->city }}</p></li>
                       <li style="font-size: 16px; font-width:700;">Employee NiD: <p>{{ $employe->nid }}</p></li>
                       <li style="font-size: 16px; font-width:700;">Employee Image: <p><img src="{{ asset('Uploades/employees/'.$employe->photo) }}" alt=""></p></li>
                       <a class="btn btn-pink" href="{{ route('employe.index') }}">Back</a>
                   </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
