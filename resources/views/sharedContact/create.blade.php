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

    <form action="{{route('sharedContact.store')}}" method="post" >
        <label for="name"> contact:
            <select name="contact" id="">
                @foreach($contacts as $contact)
                    <option value="{{$contact->id}}">{{$contact->name}}:   {{$contact->phone}}</option>
                @endforeach

            </select>
        </label>
        <label for="name"> sharing with(id):
            <input placeholder="id" name="sharing_with_id" type="number">
        </label>
        <button type="submit"> share contact</button>

        @csrf
    </form>

@endsection
