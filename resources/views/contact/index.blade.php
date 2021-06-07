@extends('layouts.app')

@section('content')

    @foreach ($contacts as $contact)
        <div class='contact'>
            <div class='head'> {{$contact->name}}</div>
            <div class='textgoal'> {{$contact->phone}} </div>
            <form action="{{route('contact.delete', [$contact])}}" method="post">
                @csrf
                <button type="submit">Delete</button>
            </form>
            <form action="{{route('contact.edit', [$contact])}}" method="get">
                <button type="submit">edit</button>
            </form>
        </div>
    @endforeach

@endsection
