@extends('layouts.app')

@section('content')
<div class="container">
    <div class="controls">
        <a href="/campings/create" class="button button-primary ripple">Create Camping</a>
    </div>
    <h1>Campings List</h1>
    {{$campings->links()}}
    @if (count($campings) > 0) 
        <div class="camping-section">
            <ul class="camping-list">
                @foreach ($campings as $camping)
                    <li class="camping-item"> 
                        <h3><a href="/campings/{{$camping->id}}">{{$camping->name}}</a></h3>
                        <span>
                            Created by <strong>{{$camping->user->name}}</strong> at {{$camping->created_at}}.
                            @if ($camping->updated_at > $camping->created_at)
                                Last edited: {{$camping->updated_at}}
                            @endif
                        </span>
                        <a href="/campings/{{$camping->id}}/edit" class="button button-edit">Edit</a>
                        {!! Form::open(['action' => ['CampingsController@destroy', $camping->id], 'method' => 'POST']) !!}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', ['class' => 'button button-delete']) }}
                        {!! Form::close() !!}  
                    </li>
                @endforeach
            </ul>
        </div>
    @else
        <p>No campings created yet. Create the first one <a href="/campings/create">here</a>.</p>
    @endif
</div>

@endsection
