@extends('layouts.app')

@section('content')
    <a href="/campings">Go Back</a>
    <div>
        <h1>{{$camping->name}}</h1>
        <img src="/storage/placeholder_images/{{$camping->placeholder_image}}">
        <small>{{$camping->city}}, {{$camping->country}}</small>
        @if ($camping->stars == 1)
            <span>{{$camping->stars}} star</span>
        @else
            <span>{{$camping->stars}} stars</span>
        @endif
        <a href="{{$camping->website}}">Book Now</a>
    </div>
    @if (!Auth::guest())
        <a href="/campings/{{$camping->id}}/edit">Edit</a>
        
        {!! Form::open(['action' => ['CampingsController@destroy', $camping->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn']) }}
        {!! Form::close() !!}
    @endif
@endsection