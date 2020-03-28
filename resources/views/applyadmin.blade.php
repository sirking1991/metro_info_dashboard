@extends('layouts.app')

@section('content')
@include('layouts.alert')

@if (!session('status') && 'no' == auth()->user()->allowed_lgu_admin && 0 <> auth()->user()->lgu_id)
    <div class="alert alert-info" role="alert">
        We are in the process of reviewing your previous application. 
        You may resubmit your application if you need to change previous application.
    </div>
@endif

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
