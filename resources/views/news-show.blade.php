@extends('layouts.show')

@php
    $status = $news->status ?? 'draft';    
    $id = $news->id ?? 0;
@endphp

@section('form-title')
    News [{{ 0 != $id ? "$news->subject" : "New"  }}]
@endsection

@section('action-buttons')
    @if ('draft'==$status)
        @if (0 != $id)
            <button class="btn btn-sm btn-danger" onclick="deleteRecord()"><i class="fas fa-trash"></i>Delete</button>                
        @endif
        <button class="btn btn-sm btn-success" onclick="$('form#main').submit()"><i class="fas fa-save"></i>{{ empty($news->ide) ? 'Save' : 'Update' }}</button>
    @endif        
    @if (('draft'==$status || 'unpublish'==$status) && 0 != $id)
        <button class="btn btn-sm btn-primary" onclick="publish()"><i class="fas fa-trash"></i>Publish</button>    
    @endif
    @if ('published'==$status) 
        <button class="btn btn-sm btn-danger" onclick="unpublish()"><i class="fas fa-trash"></i>Unpublish</button>    
    @endif    
    
    <button class="btn btn-sm btn-secondary" onclick="window.close()"><i class="fas fa-times"></i>Close</button>
@endsection

@section('card-body')
    @if (!empty($news->id))
        @method('PUT')    
    @endif
    
    <input type="hidden" name="id" value="{{$news->id ?? ''}}">
    
    <div class="form-group">
        <div class="row">
        <div class="col-6">
            {!! Form::label('posting_date', 'Posting date:', ['class' => 'control-label']) !!}
            {!! Form::date('posting_date', $news->posting_date ?? date('Y-m-d'), ['class' => 'form-control']) !!}
        </div>
        <div class="col-6">
            {!! Form::label('status', 'Status:', ['class' => 'control-label']) !!}
            {!! Form::text('status', strtoupper($status), ['class' => 'form-control', 'disabled'=>'disabled']) !!}
        </div>
    </div>
        
    </div>

    <div class="form-group">
        {!! Form::label('subject', 'Subject:', ['class' => 'control-label']) !!}
        {!! Form::text('subject', $news->subject ?? '', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('content', 'Content:', ['class' => 'control-label']) !!}
        {!! Form::textarea('content', $news->content ?? '', ['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('broadcast', 'Broadcast:', ['class' => 'control-label']) !!}
        {!! Form::select('broadcast', ['no' => 'No', 'yes' => 'Yes'], $news->broadcast ?? 'no') !!}
    </div>    

    
@endsection


@section('scripts')
    <script type="text/javascript">

        function publish(){
            if(!confirm("Are you sure you want to publish this news?")) return;
            
            axios.get('/news/{{ $id }}/publish', {id:'{{ $id }}'})
                .then(res=>{
                    console.log(res);
                    window.location.reload();
                })
                .catch(err=>console.error(err))
                
        }

        function unpublish(){
            if(!confirm("Are you sure you want to unpublish this news?")) return;
            
            axios.get('/news/{{ $id }}/unpublish', {id:'{{ $id }}'})
                .then(res=>{
                    console.log(res);
                    window.location.reload();
                })
                .catch(err=>console.error(err))
                
        }        

        document.addEventListener('DOMContentLoaded', function(){ 

        }, false);

    </script>
@endsection