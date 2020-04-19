@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm bg-white rounded">
                <div class="card-header"><h3>About {{ Str::title($lgu->name) }}</h3></div>

                <div class="card-body">
                    <div class="row">
                        <div class="coll align-self-center">
                            <img src="{{ $lgu->logo_url }}" alt="" srcset="" width="256">
                        </div>
                        <div class="coll align-self-start">{{ $lgu->about }}</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
