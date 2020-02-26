@extends('layouts.app')

@section('content')
    <h3>Edit post</h3>
    {!! Form::open(['action' => ['CampingsController@update', $camping->id], 'method' => 'POST']) !!}
        <div>
            {{ Form::label('title', 'Camping Name') }}
            {{ Form::text('name', $camping->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}

            {{ Form::label('title', 'City') }}
            {{ Form::text('city', $camping->city, ['class' => 'form-control', 'placeholder' => 'City']) }}
           
            {{ Form::label('title', 'Country') }}
            {{ Form::text('country', $camping->country, ['class' => 'form-control', 'placeholder' => 'Country']) }}

            {{ Form::label('title', 'Website') }}
            {{ Form::url('website', $camping->website, ['class' => 'form-control', 'placeholder' => 'Website']) }}
           
            {{ Form::label('title', 'Stars') }}
            {{Form::selectRange('stars', $camping->stars, 1, 5) }}

            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Submit', ['class' => 'btn'])}}
        </div>
    {!! Form::close() !!}
@endsection