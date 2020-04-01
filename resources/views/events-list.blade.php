@extends('layouts.list')

@section('form-title')
    Events
@endsection

@section('action-buttons')
    <button class="btn btn-sm btn-primary float-right" onclick="window.open('/events/')"><i class="fas fa-plus"></i>Create new</button>
@endsection

@section('table-header')
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Date</th>
        <th scope="col">Posted by</th>
        <th scope="col">Name</th>
        <th scope="col">Broadcast</th>
        <th scope="col">&nbsp;</th>
    </tr>
@endsection

@section('table-body')
    @foreach ($events as $e)
    <tr>
        <td>{{ $e->id }}</td>
        <td>
        @php
            echo date('F j, Y, g:i a', strtotime($e->event_from)) . ' to ';
            if (date('Y-m-d', strtotime($e->event_from)) == date('Y-m-d', strtotime($e->event_to))) {
                echo date('g:i a', strtotime($e->event_to));
            } else {
                echo date('F j, Y, g:i a', strtotime($e->event_to));
            }
        @endphp
        </td>
        <td>{{ $e->user->name }}</td>
        <td>{{ $e->title }}</td>
        <td>{{ Str::title($e->broadcast) }}</td>
        <td><button class="btn btn-sm btn-primary" onclick="window.open('{{ url('/events/'.$e->id) }}', '{{ $e->id }}')"><i class="fas fa-external-link-alt"></i>View</button></td>
    </tr>
    @endforeach
@endsection

@section('table-footer')
    {{ $events->appends(['search' => $search ?? ''])->links() }}
@endsection

