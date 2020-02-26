@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

                
            </div>
        </div>
    </div>
    <div>
        <a href="/campings/create">Create Camping</a>
        <h3>Campings List</h3>
        @if (count($campings) > 0)
            
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($campings as $camping)
                            <td><a href="/campings/{{$camping->id}}">{{$camping->name}}</a></td>
                            <td><a href="/campings/{{$camping->id}}/edit">Edit</a></td>
                            <td>
                                {!! Form::open(['action' => ['CampingsController@destroy', $camping->id], 'method' => 'POST']) !!}
                                    {{ Form::hidden('_method', 'DELETE') }}
                                    {{ Form::submit('Delete', ['class' => 'btn']) }}
                                {!! Form::close() !!}    
                            </td>
                        @endforeach
                        {{$campings->links()}}
                    </tr>
                </tbody>
            </table>
        @else
            <p>No campings created yet. Create the first one <a href="/campings/create">here</a>.</p>
        @endif
    </div>
</div>
@endsection
