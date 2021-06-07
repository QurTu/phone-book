@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('contact.update', [$contact])}}" method="post" >
        <label for="name"> Name:
            <input value="{{$contact->name}}" name="name" type="text">
        </label>
        <label for="name"> Number:
            <input value="{{$contact->phone}}" name="phone" type="text">
        </label>
        <button type="submit"> submit</button>

        @csrf
    </form>

@endsection
