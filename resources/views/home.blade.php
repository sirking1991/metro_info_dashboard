@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm bg-white rounded">
                {{-- <div class="card-header"><strong>Dashboard</strong></div> --}}

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1>Welcome to metro-info</h1>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
