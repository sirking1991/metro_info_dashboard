@extends('layouts.list')

@section('form-title')
    Incoming Messages
@endsection

@section('action-buttons')
    {{-- <button class="btn btn-sm btn-primary float-right" onclick="window.open('/messages/')"><i class="fas fa-plus"></i>Create new</button> --}}
@endsection

@section('table-header')
    <tr>
        <th scope="col">ID</th>        
        <th scope="col">From</th>
        <th scope="col">Received on</th>
        <th scope="col">Message</th>
        <th scope="col">Read on</th>
    </tr>
@endsection

@section('table-body')
    @foreach ($messages as $m)
    <tr>
        <td>{{ $m->id }}</td>
        <td>{{ $m->appUser->first_name . ' ' . $m->appUser->last_name }}</td>
        <td>
        @php
            echo date('F j, Y, g:i a', strtotime($m->created_at));
        @endphp
        </td>
        <td>{{ $m->message }}</td>
        <td>
            @if (null == $m->read_on)
                <button class="btn btn-sm btn-primary" onclick="markRead({{ $m->id }})"><i class="fas fa-external-link-alt"></i>Mark as Read</button>                
            @else
                @php echo date('F j, Y, g:i a', strtotime($m->read_on)); @endphp
                by {{ $m->user->name }}
            @endif

        </td>
    </tr>
    @endforeach
@endsection

@section('table-footer')
    {{ $messages->appends(['search' => $search ?? ''])->links() }}
@endsection

<script>
    function markRead(id) {
        if(!confirm('Are you sure you wan to mark the message as read?')) return;

        $.get('/messages/' + id + '/mark-read', function(){
            location.reload();
        });
    }
</script>