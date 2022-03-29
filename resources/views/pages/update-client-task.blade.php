@extends('main')
@section('content')
    <div class="container" style="width: 60%">
        <div style="text-transform: capitalize"><h2>atnaujinti {{$task->title}} būsena</h2></div>
        <div>
            @include('_partials/errors')
            <form action="/update/client/{{$task->id}}" method="post">
                @csrf
                <div class="card">
                    <div class="card-header" style="text-transform: capitalize">
                        Tema: {{$task->title}}
                    </div>
                    <div class="card-body">
                        <p class="card-text">Aprašymas: {{$task->description}}</p>
                        <p class="card-text">Atsakymas: {{$task->taskResponse}}</p>
                        <button type="submit" class="btn btn-success">Patvirtinti</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
