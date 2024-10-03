@extends('layouts.master')
@section('title','Dasdboard')
@section('style')
    <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet" />
@endsection
@section('content')
    <section class="dashboard-container">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center flex-column">
                    <div class="card card-body d-flex justify-content-center shadow-custom-03 px-1 p-md-5 blur align-items-center">
                        <div class="alert alert-success p-4 text-center" role="alert">
                            You have successfully logged into the managment dashboard!
                        </div>

                        <a class="btn btn-secondary px-4" href="{{route('logout')}}" role="button">Logout</a>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('script')

@endsection
