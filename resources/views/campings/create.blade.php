@extends('layouts.app')

@section('content')
    <h3>Create post</h3>
    {!! Form::open(['action' => 'CampingsController@store', 'method' => 'POST']) !!}
        <div>
            {{ Form::label('title', 'Camping Name') }}
            {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}

            {{ Form::label('title', 'City') }}
            {{ Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City']) }}
           
            {{ Form::label('title', 'Country') }}
            {{ Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Country']) }}
           
            {{ Form::label('title', 'Website') }}
            {{ Form::url('website', '', ['class' => 'form-control', 'placeholder' => 'Website']) }}
           
            {{ Form::label('title', 'Stars') }}
            {{Form::selectRange('stars', 1, 5) }}

            {{ Form::submit('Submit', ['class' => 'btn']) }}
        </div>
    {!! Form::close() !!}
@endsection