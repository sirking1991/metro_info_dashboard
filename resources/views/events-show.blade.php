@extends('layouts.show')

@php
    $status = $events->status ?? 'draft';    
    $id = $events->id ?? 0;
@endphp

@section('form-title')
    Events [{{ 0 != $id ? "$events->title" : "New"  }}]
@endsection

@section('action-buttons')
    @if ('draft'==$status)
        @if (0 != $id)
            <button class="btn btn-sm btn-danger" onclick="deleteRecord()"><i class="fas fa-trash"></i>Delete</button>                
        @endif
        <button class="btn btn-sm btn-success" onclick="$('form#main').submit()"><i class="fas fa-save"></i>{{ empty($events->ide) ? 'Save' : 'Update' }}</button>
    @endif           
    
    <button class="btn btn-sm btn-secondary" onclick="window.close()"><i class="fas fa-times"></i>Close</button>
@endsection

@section('card-body')
    @if (!empty($events->id))
        @method('PUT')    
    @endif
    
    <input type="hidden" name="id" value="{{$events->id ?? ''}}">
    
    <div class="form-group">
        <div class="row">
        <div class="col-6">
            {!! Form::label('event_from', 'Event date from:', ['class' => 'control-label']) !!}
            {!! Form::datetime('event_from', $events->event_from ?? date('Y-m-d'), ['class' => 'form-control datetime']) !!}
        </div>
        <div class="col-6">
            {!! Form::label('event_to', 'Event date to:', ['class' => 'control-label']) !!}
            {!! Form::datetime('event_to', $events->event_to ?? date('Y-m-d'), ['class' => 'form-control datetime']) !!}
        </div>
    </div>
        
    </div>

    <div class="form-group">
        {!! Form::label('title', 'Event name:', ['class' => 'control-label']) !!}
        {!! Form::text('title', $events->title ?? '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('broadcast', 'Broadcast:', ['class' => 'control-label']) !!}
        {!! Form::select('broadcast', ['no' => 'No', 'yes' => 'Yes'], $events->broadcast ?? 'no') !!}
    </div>    

    
@endsection


@section('scripts')
    <script type="text/javascript">

        document.addEventListener('DOMContentLoaded', function(){ 
            
            

        }, false);

    </script>
@endsection