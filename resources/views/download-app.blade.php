@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-sm bg-white rounded">
                <div class="card-body">
                    <p>
                        <strong>metro-info</strong> is an Information dissemination platform for Local Government Units.
                        <ul>
                            <li>Get timely, accurate news, events from your local government. </li>
                            <li>Get notified of important announcements</li>
                            <li>Send feedback</li>
                            <li>Help by reporting an incident or issues in your environment.</li>
                        </ul>
                    </p>
                    <div class=" text-center">
                        <a href="#">
                            <img src="{{ url("images/google-play-badge.png") }}" alt="" srcset="" width="256">                    
                        </a>
                        <a href="#">
                            <img src="{{ url("images/apple-appstore-badge.png") }}" alt="" srcset="" width="256">                    
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="links">
        <a href="https://www.websitepolicies.com/policies/view/IJZauoEt" target="toc">Terms of use</a>
    </div>    
</div>
@endsection
