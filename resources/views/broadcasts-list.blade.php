@extends('layouts.list')

@section('form-title')
    Broadcasts
@endsection

@section('action-buttons')
    <button class="btn btn-sm btn-primary float-right" onclick="window.open('/broadcasts/')"><i class="fas fa-plus"></i>Create new</button>
@endsection

@section('table-header')
    <tr>
        <th scope="col">ID</th>        
        <th scope="col">Posted by</th>
        <th scope="col">Broadcast on</th>
        <th scope="col">Broadcast via</th>
        <th scope="col">Message</th>
        <th scope="col">Status</th>
        <th scope="col">&nbsp;</th>
    </tr>
@endsection

@section('table-body')
    @foreach ($broadcasts as $b)
    <tr>
        <td>{{ $b->id }}</td>
        <td>{{ $b->user->name }}</td>
        <td>
            @php echo date('F j, Y, g:i a', strtotime($b->broadcast_on)); @endphp
        </td>
        <td>
            @php echo strtoupper($b->broadcast_via); @endphp
        </td>
        <td>{{ $b->message }}</td>
        <td>{{ Str::title($b->status) }}</td>
        <td><button class="btn btn-sm btn-primary" onclick="window.open('{{ url('/broadcasts/'.$b->id) }}', '{{ $b->id }}')"><i class="fas fa-external-link-alt"></i>View</button></td>
    </tr>
    @endforeach
@endsection

@section('table-footer')
    {{ $broadcasts->appends(['search' => $search ?? ''])->links() }}
@endsection

