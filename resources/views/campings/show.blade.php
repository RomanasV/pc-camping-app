@extends('layouts.app')

<a href="/campings">Go Back</a>
@section('content')
    <div class="camping-content">
        <div class="card">
            <img src="/storage/placeholder_images/{{$data['camping']->placeholder_image}}">
                <div class="card-info">
                    <h2>
                        <a href="/campings/{{$data['camping']->id}}">
                            {{$data['camping']->name}}
                        </a>
                    </h2>
                    <div class="location-info">
                        <div class="location">
                            <a href="#" class="link">{{$data['camping']->city}}</a><a href="#" class="link">{{$data['camping']->country}}</a>
                        </div>
                        <div class="ranking">
                            @for ($i = 0; $i < $data['camping']->stars; $i++)
                                <span class="ranking-star"></span>
                            @endfor
                        </div>
                    </div>
                            
                    <p>{!! nl2br(e($data['camping']->description)) !!}</p>

                    <a href="{{$data['camping']->website}}" target="_blank" class="button button-primary ripple">Where to book?</a>
                    @if (!Auth::guest())
                        @if (Auth::user()->id == $data['camping']->user_id)
                            <div class="controls">
                                <a href="/campings/{{$data['camping']->id}}/edit" class="button button-primary ripple">Edit</a>
                                
                                {!! Form::open(['action' => ['CampingsController@destroy', $data['camping']->id], 'method' => 'POST']) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', ['class' => 'button color-secondary ripple']) }}
                                {!! Form::close() !!}
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>


@include('inc.popularList')
    
    {{-- @if (!Auth::guest())
        <a href="/campings/{{$camping->id}}/edit">Edit</a>
        
        {!! Form::open(['action' => ['CampingsController@destroy', $camping->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Delete', ['class' => 'btn']) }}
        {!! Form::close() !!}
    @endif --}}
@endsection