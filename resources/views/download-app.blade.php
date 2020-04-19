@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm bg-white rounded">
                <div class="card-body text-center">
                    <a href="#">
                        <img src="{{ asset("images/google-play-badge.png") }}" alt="" srcset="" width="256">                    
                    </a>

                    <a href="#">
                        <img src="{{ asset("images/apple-appstore-badge.png") }}" alt="" srcset="" width="256">                    
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
