@extends('layouts.app')

@section('content')
    <a href="/campings">Go Back</a>
    <div>
        <h1>{{$camping->name}}</h1>
        <small>{{$camping->city}}, {{$camping->country}}</small>
    </div>
    <a href="/campings/{{$camping->id}}/edit">Edit</a>

    {!! Form::open(['action' => ['CampingsController@destroy', $camping->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn']) }}
    {!! Form::close() !!}
@endsection