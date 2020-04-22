@extends('layouts.show')

@section('form-title')
    App Settings
@endsection

@section('action-buttons')
    <button class="btn btn-sm btn-success" onclick="$('form#main').submit()"><i class="fas fa-save"></i>Update</button>
@endsection

@section('card-body')
    @method('PUT')

    <div class="form-group">
        <label for="">Theme</label>
        {!! Form::select('color', 
            [
                'amber' => 'Amber', 
                'red' => 'Red',
                'green' => 'Green',
                'lightGreen' => 'Light Green',
                'blue' => 'Blue',
                'blueAccent' => 'Blue Accent',
                'blueGrey' => 'Blue Grey',
                'brown' => 'Brown',
                'cyan' => 'Cyan',
                'orange' => 'Orange',
                'pink' => 'Pink',
                'purple' => 'Purple',
                'indigo' => 'Indigo',
                'teal' => 'Teal',

            ], 
        $lgu->color ?? 'amber') !!}
    </div>

    <div class="form-group">
        <label for="">Link to about page</label>
        {!! Form::text('about', $lgu->about ?? '', ['class' => 'form-control']) !!}        
    </div>
@endsection

