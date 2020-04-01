@extends('layouts.show')

@php
    $status = $broadcasts->status ?? 'pending';    
    $id = $broadcasts->id ?? 0;
@endphp

@section('form-title')
    Broadcasts [{{ 0 != $id ? "$broadcasts->message" : "New"  }}]
@endsection

@section('action-buttons')
    @if ('pending'==$status)
        @if (0 != $id)
            <button class="btn btn-sm btn-danger" onclick="deleteRecord()"><i class="fas fa-trash"></i>Delete</button>                
        @endif
        <button class="btn btn-sm btn-success" onclick="submitBroadcast()"><i class="fas fa-save"></i>{{ empty($broadcasts->ide) ? 'Save' : 'Update' }}</button>
    @endif           
    
    <button class="btn btn-sm btn-secondary" onclick="window.close()"><i class="fas fa-times"></i>Close</button>
@endsection

@section('card-body')
    @if (!empty($broadcasts->id))
        @method('PUT')    
    @endif
    
    <input type="hidden" name="id" value="{{$broadcasts->id ?? ''}}">
    
    <div class="form-group">
        <div class="row">
            <div class="col-6">
                {!! Form::label('broadcast_on', 'Broadcast on', ['class' => 'control-label']) !!}
                {!! Form::datetime('broadcast_on', $broadcasts->broadcast_on ?? date('Y-m-d'), ['class' => 'form-control datetime']) !!}
            </div>
            <div class="col-6">
                {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
                <input type="text" name="status" class="form-control" disabled value="{{ Str::title($status) }}"/>
            </div>
        </div>
    </div>

    <div class="form-group">
        {!! Form::label('message', 'Message:', ['class' => 'control-label']) !!}
        <input type="text" name="message" class="form-control" maxlength="256" value="{{ $broadcasts->message ?? '' }}" />
    </div>

    
@endsection


@section('scripts')
    <script type="text/javascript">
        function submitBroadcast(){
            if(!confirm('Are you sure you want to broadcast the message?')) return;
            $('form#main').submit();
        }

        document.addEventListener('DOMContentLoaded', function(){ 
            
            

        }, false);

    </script>
@endsection