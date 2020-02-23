@extends('layouts.app')

@section('content')
    @if (count($campings['campings_by_date_desc']) > 0)
        <div>
            <a href="/campings/create">Create Post</a>

            <h1>Posts by date desc:</h1>
            @foreach ($campings['campings_by_date_desc'] as $camping)
                <div>
                    <h3>
                        <a href="/campings/{{$camping->id}}">
                            {{$camping->name}}
                        </a>
                    <h3>
                    <p>{{$camping->city}}, {{$camping->country}}</p>
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
                </div>
            @endforeach
        </div>
    @else
        No campings found
    @endif
@endsection