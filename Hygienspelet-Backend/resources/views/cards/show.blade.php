@extends('layout')

@section('content')
    <h1>Show page</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <h1>{{ $card->title  }}</h1>

            <ul class="list-group">

                @foreach($card->notes as $note)

                    <li class="list-group-item">{{ $note->body }}</li>
                @endforeach

                <hr>
                <h3>Add a new note</h3>

                {{--<form method="POST" action="/cards/{{ $card->id }}/notes">--}}
                    {{--<form method="POST" action="/admin/store">--}}
                    <form method="POST" action="/check/2">

                    {!! csrf_field() !!}
                    <div class="form-group">
                        <textarea name="body" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"  >Add note</button>
                    </div>

                </form>

            </ul>
        </div>

    </div>



@stop