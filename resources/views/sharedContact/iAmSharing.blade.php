@extends('layouts.app')

@section('content')


    @foreach ($contacts as $contact)
        <div class='contact'>
            <div>contact shared by: {{$contact->receiver_name}}</div>
            <div class='head'>{{ $contact->name }} </div>
            <div class='textgoal'>{{ $contact->phone }}  </div>
            <form action="{{route('sharedContact.delete', ['contact' => $contact->id])}}" method="post">
                @csrf
                <button type="submit">Delete</button>
            </form>
            <br>
            <br>
        </div>
    @endforeach

@endsection
