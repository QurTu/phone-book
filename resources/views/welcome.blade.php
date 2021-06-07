@extends('layouts.app')

@section('content')
   Public contacts:
    @foreach ($contacts as $contact)
        <div class='contact'>
            <div class='head'> {{$contact->name}}</div>
            <div class='textgoal'> {{$contact->phone}} </div>
        </div>
    @endforeach

@endsection
