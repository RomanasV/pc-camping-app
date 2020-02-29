@extends('layouts.app')

@section('content')
    <h3>Create post</h3>
    {!! Form::open(['action' => 'CampingsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div>
            <div class="form-group">
                {{ Form::label('title', 'Camping Name') }}
                {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('title', 'City') }}
                {{ Form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City']) }}
            </div>
            <div class="form-group">
                {{ Form::label('title', 'Country') }}
                {{ Form::text('country', '', ['class' => 'form-control', 'placeholder' => 'Country']) }}
            </div>
            <div class="form-group">
                {{ Form::label('title', 'Description') }}
                {{ Form::textArea('description', '', ['class' => 'form-control', 'placeholder' => 'Description']) }}
            </div>
            <div class="form-group">
                {{ Form::label('title', 'Website') }}
                {{ Form::url('website', '', ['class' => 'form-control', 'placeholder' => 'Website']) }}
            </div>
            <div class="form-group">
                {{ Form::label('title', 'Stars') }}
                {{ Form::selectRange('stars', 1, 5) }}
            </div>
            <div class="form-group">
                {{ Form::file('placeholder_image') }}
            </div>

            {{ Form::submit('Submit', ['class' => 'btn']) }}
        </div>
    {!! Form::close() !!}
@endsection