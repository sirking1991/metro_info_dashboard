@extends('layouts.app')

@section('content')
@include('layouts.alert')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm bg-white rounded">
                <div class="card-header"><strong>Apply LGU to administer content</strong></div>

                <div class="card-body">
                    <form action="/applyadmin" method="post" enctype="multipart/form-data">
                        @csrf            
                        <select-regions-and-lgu-component r="{{ $regions }}" l="{{ $lgus }}"></select-regions-and-lgu-component>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
