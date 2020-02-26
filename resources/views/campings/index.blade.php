@extends('layouts.app')

@section('content')
    @if (count($campings['campings_by_date_desc']) > 0)
        <div>
            @if (!Auth::guest())
                <a href="/campings/create">Create Post</a>
            @endif

            <h1>Posts by date desc:</h1>
            @foreach ($campings['campings_by_date_desc'] as $camping)
                <div>
                    <h3>
                        <a href="/campings/{{$camping->id}}">
                            {{$camping->name}}
                        </a>
                    <h3>
                    <img src="/storage/placeholder_images/{{$camping->placeholder_image}}">
                    <p>{{$camping->city}}, {{$camping->country}}</p>
                    @if ($camping->stars == 1)
                        <span>{{$camping->stars}} star</span>
                    @else
                        <span>{{$camping->stars}} stars</span>
                    @endif
                    <a href="{{$camping->website}}">Book Now</a>
                    @if (!Auth::guest())
                        {{-- Add an edit and delete icons in this place --}}
                        <a href="/campings/{{$camping->id}}/edit">Edit</a>
                        
                        {!! Form::open(['action' => ['CampingsController@destroy', $camping->id], 'method' => 'POST']) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', ['class' => 'btn']) }}
                        {!! Form::close() !!}
                    @endif
                </div>
            @endforeach
            {{$campings['campings_by_date_desc']->links()}}
        </div>

        <div>
            <h1>Posts by date desc:</h1>
            @foreach ($campings['campings_by_date_asc'] as $camping)
                <div>
                    <h3>
                        <a href="/campings/{{$camping->id}}">
                            {{$camping->name}}
                        </a>
                    <h3>
                    <p>{{$camping->city}}, {{$camping->country}}</p>
                    @if ($camping->stars == 1)
                        <span>{{$camping->stars}} star</span>
                    @else
                        <span>{{$camping->stars}} stars</span>
                    @endif
                    <a href="{{$camping->website}}">Book Now</a>
                </div>
            @endforeach
        </div>
    @else
        No campings found
    @endif
@endsection