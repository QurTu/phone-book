@extends('layouts.app')

@section('content')

    @foreach ($contacts as $contact)
        <div class='contact'>
            <div class='head'> {{$contact->name}}</div>
            <div class='textgoal'> {{$contact->phone}} </div>
            <form action="{{route('publicContact.delete', [$contact])}}" method="post">
                @csrf
                <button type="submit">Delete</button>
            </form>

        </div>
    @endforeach

@endsection
