@extends('layouts.app')

@section('content')
    <h3>Edit post</h3>
    {!! Form::open(['action' => ['CampingsController@update', $camping->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div>
            <div class="form-group">
                {{ Form::label('title', 'Camping Name') }}
                {{ Form::text('name', $camping->name, ['class' => 'form-control', 'placeholder' => 'Name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('title', 'City') }}
                {{ Form::text('city', $camping->city, ['class' => 'form-control', 'placeholder' => 'City']) }}
            </div>
            <div class="form-group">
                {{ Form::label('title', 'Country') }}
                {{ Form::text('country', $camping->country, ['class' => 'form-control', 'placeholder' => 'Country']) }}
            </div>
            <div class="form-group">
                {{ Form::label('title', 'Description') }}
                {{ Form::textArea('description', $camping->description, ['class' => 'form-control', 'placeholder' => 'Description']) }}
            </div>
            <div class="form-group">
                {{ Form::label('title', 'Website') }}
                {{ Form::url('website', $camping->website, ['class' => 'form-control', 'placeholder' => 'Website']) }}
            </div>
            <div class="form-group">           
                {{ Form::label('title', 'Stars') }}
                {{Form::selectRange('stars', $camping->stars, 1, 5) }}
            </div>
            <div class="form-group">
                {{ Form::file('placeholder_image') }}
                Current image: <img src="/storage/placeholder_images/{{$camping->placeholder_image}}">
            </div>

            {{ Form::hidden('_method', 'PUT') }}
            {{ Form::submit('Submit', ['class' => 'btn'])}}
        </div>
    {!! Form::close() !!}
@endsection