@extends('main')
@section('content')
    <div class="container" style="width: 60%">
        <div style="text-transform: capitalize"><h2>atnaujinti {{$task->title}} būsena</h2></div>
        <div>
            @include('_partials/errors')
            <form action="/update/{{$task->id}}" method="post">
                @csrf
            <div class="card">
                <div class="card-header" style="text-transform: capitalize">
                  Tema: {{$task->title}}
                </div>
                <div class="card-body">
                    <p class="card-text">Aprašymas: {{$task->description}}</p>
                    <div class="form-group" style="visibility: hidden">
                        <select name="status" class="form-select">
                            <option value='checked' selected>
                            </option>
                        </select>
                    </div>
                    <div class="card-text form-group">
                        <textarea class="form-control form-control-lg" name="taskResponse" placeholder="Atsakymas į užklausa"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Pateikti</button>
                </div>
            </div>
            </form>
        </div>
    </div>

@endsection
