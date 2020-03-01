@extends('layouts.app')

@section('content')
    @if (count($data['campings_by_date_desc']) > 0)
        <div class="new-listings">
            {{-- <h1>Posts by date desc:</h1> --}}
                @foreach ($data['campings_by_date_desc'] as $camping)
                    <div class="card">
                        <img src="/storage/placeholder_images/{{$camping->placeholder_image}}">
                            <div class="card-info">
                                <h2>
                                    <a href="/campings/{{$camping->id}}">
                                        {{$camping->name}}
                                    </a>
                                </h2>
                                <div class="location-info">
                                    <div class="location">
                                        <a href="#" class="link">{{$camping->city}}</a><a href="#" class="link">{{$camping->country}}</a>
                                    </div>
                                    <div class="ranking">
                                        @for ($i = 0; $i < $camping->stars; $i++)
                                            <span class="ranking-star"></span>
                                        @endfor
                                    </div>
                                </div>

                                <h3 class="ranking center">Very good 9.2 / 10</h3>
                            
                                <a href="/campings/{{$camping->id}}" class="button button-primary ripple">More information</a>
                                
                                <a href="{{$camping->website}}" target="_blank" class="link link-primary center">Where to book?</a>
                                @if (!Auth::guest())
                                {{-- Add an edit and delete icons in this place --}}
                                {{-- <a href="/campings/{{$camping->id}}/edit">Edit</a>
                                
                                {!! Form::open(['action' => ['CampingsController@destroy', $camping->id], 'method' => 'POST']) !!}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', ['class' => 'btn']) }}
                                {!! Form::close() !!} --}}
                                @endif
                            </div>
                        </div>
                @endforeach
            {{$data['campings_by_date_desc']->links()}}
        </div>

        @include('inc.popularList')
    @else
        No campings found
    @endif
@endsection