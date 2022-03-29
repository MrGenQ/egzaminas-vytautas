@extends('main')
@section('content')
    <div class="container" style="width: 60%">
        <div><h2 style="font-size: 60px;">Pridėti užklausa</h2></div>
        <div>
            @include('_partials/errors')

            <form action="/store-task" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="title" placeholder="Užklausos tema" >
                </div>
                <div class="form-group">
                    <textarea class="form-control form-control-lg" name="description" placeholder="Aprašymas"></textarea>
                </div>
                <button type="submit" class="btn btn-secondary" >Pridėti</button>
            </form>
        </div>
    </div>

@endsection
