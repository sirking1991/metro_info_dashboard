@extends('layouts.list')

@section('form-title')
    News
@endsection

@section('action-buttons')
    <button class="btn btn-sm btn-primary float-right" onclick="window.open('/news/')"><i class="fas fa-plus"></i>Create new</button>
@endsection

@section('table-header')
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Date</th>
        <th scope="col">Status</th>
        <th scope="col">Posted by</th>
        <th scope="col">Subject</th>
        <th scope="col">Broadcast</th>
        <th scope="col">&nbsp;</th>
    </tr>
@endsection

@section('table-body')
    @foreach ($news as $n)
    <tr>
        <td>{{ $n->id }}</td>
        <td>{{ $n->posting_date }}</td>
        <td>{{ strtoupper($n->status) }}</td>
        <td>{{ $n->user->name }}</td>
        <td>{{ $n->subject }}</td>
        <td>{{ $n->broadcast }}</td>
        <td><button class="btn btn-sm btn-primary" onclick="window.open('{{ url('/news/'.$n->id) }}', '{{ $n->id }}')"><i class="fas fa-external-link-alt"></i>View</button></td>
    </tr>
    @endforeach
@endsection

@section('table-footer')
    {{ $news->appends(['search' => $search ?? ''])->links() }}
@endsection

