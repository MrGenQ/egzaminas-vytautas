<?php
use App\Models\Main;
?>
@extends('main')
@section('content')
    <div class="container" style="width: 80%; display: flex; justify-content: center; flex-direction: column;">
        <h1 style="text-transform: capitalize;">užklausos</h1>
        <form>
            <div style="display: flex; flex-direction: column;" class="form-select-lg"><label>Būklės filtas</label>
                <select class="form-select" name="status" style="width: 20em; height: 3em;">

                    <option value="" selected>--Jokio filtro--</option>
                    <option value="unchecked">Neatsakyta</option>
                    <option value="checked">Atsakyta</option>
                    <option value="done">Uždaryta</option>

                </select>
            </div>
            <div style="padding-top: 1.5%;">
                <button class="btn btn-secondary" type="submit" style="width: 10em;">Filtruoti</button>
            </div>
        </form>
        @if($errors !== '')
            <div class="alert alert-danger">
                {{$errors}}
            </div>
        @endif
        @if(empty(Auth::user()->name))
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Tema</th>
                    <th scope="col">Aprašymas</th>
                    <th scope="col">Atsakymas</th>
                    <th scope="col">Būklė</th>
                    <th scope="col">Veiksmas</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{$task->title}}</th>
                        <td>{{$task->description}}</td>
                        <td>{{$task->taskResponse}}</td>
                            @if($task->status === 'unchecked')
                                <td><div class="btn btn-warning">Neatsakyta</div></td>
                                @elseif($task->status === 'checked')
                                    <td><div class="btn btn-success">Atsakyta</div></td>
                                    @else <td><div class="btn btn-info">Uždaryta</div></td>
                            @endif
                        <td>
                            @if($task->status === 'checked')
                            <a href="/update/client/{{$task->id}}" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                                @else <div>Nėra</div>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            @else
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tema</th>
                        <th scope="col">Aprašymas</th>
                        <th scope="col">Atsakymas</th>
                        <th scope="col">Būklė</th>
                        <th scope="col">Veiksmas</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <th scope="row">{{$task->title}}</th>
                            <td>{{$task->description}}</td>
                            <td>{{$task->taskResponse}}</td>
                            @if($task->status === 'unchecked')
                                <td><div class="btn btn-warning">Neatsakyta</div></td>
                            @elseif($task->status === 'checked')
                                <td><div class="btn btn-success">Atsakyta</div></td>
                            @else <td><div class="btn btn-info">Uždaryta</div></td>
                            @endif
                            <td>
                                @if($task->status !== 'done')
                                <a href="/update/{{$task->id}}" class="btn btn-warning">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
                                @endif
                                <a href="/delete/{{$task->id}}" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        @endif
        {{ $tasks->links() }}
    </div>

@endsection
