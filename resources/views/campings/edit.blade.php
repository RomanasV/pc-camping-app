@extends('layouts.app')

@section('content')
<div class="form">
    <h1 class="center">Edit Camping</h1>
    {!! Form::open(['action' => ['CampingsController@update', $camping->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{ Form::text('name', $camping->name, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) }}
            {!! htmlspecialchars_decode(Form::label('title', '<span class="content-name">Camping Name</span>', ['class' => 'label-name'])) !!}
        </div>
        <div class="form-group">
            {{ Form::text('city', $camping->city, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) }}
            {!! htmlspecialchars_decode(Form::label('title', '<span class="content-name">City</span>', ['class' => 'label-name'])) !!}
        </div>
        <div class="form-group">
            {{ Form::text('country', $camping->country, ['class' => 'form-control', 'autocomplete' => 'off', 'required']) }}
            {!! htmlspecialchars_decode(Form::label('title', '<span class="content-name">Country</span>', ['class' => 'label-name'])) !!}
        </div>
        <div class="form-group">
            {{ Form::textArea('description', $camping->description, ['class' => 'form-control', 'autocomplete' => 'off', 'required', 'rows' => '4']) }}
            {!! htmlspecialchars_decode(Form::label('title', '<span class="content-name">Description</span>', ['class' => 'label-name'])) !!}
        </div>
        <div class="form-group">
            {{ Form::url('website', $camping->website, ['class' => 'form-control', 'required']) }}
            {!! htmlspecialchars_decode(Form::label('title', '<span class="content-name">Website</span>', ['class' => 'label-name'])) !!}
        </div>
        <div class="form-group">
            {{ Form::number('ranking', $camping->ranking, ['class' => 'form-control', 'step' => '0.1', 'required']) }}
            {!! htmlspecialchars_decode(Form::label('title', '<span class="content-name">Ranking</span>', ['class' => 'label-name'])) !!}
        </div>
        <div class="form-group">
            {{ Form::text('tags', $camping->tags, ['class' => 'form-control', 'required']) }}
            {!! htmlspecialchars_decode(Form::label('title', '<span class="content-name">Tags (separate by commas)</span>', ['class' => 'label-name'])) !!}
        </div>
        <div class="form-group-inline">
            <div class="form-group">
                {{ Form::selectRange('stars', 1, 5) }}
                {!! htmlspecialchars_decode(Form::label('title', 'Stars', ['class' => 'label-name'])) !!}
            </div>
            <div class="form-group">
                {{ Form::file('placeholder_image') }}
                {!! htmlspecialchars_decode(Form::label('title', 'Image', ['class' => 'label-name'])) !!}
            </div>
        </div>

        {{ Form::hidden('_method', 'PUT') }}
        {{ Form::submit('Submit', ['class' => 'button button-primary ripple']) }}
    {!! Form::close() !!}
</div>
@endsection