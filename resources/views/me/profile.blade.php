@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">{{ $user->name }}</h5>
        <div class="card-body">
            @if($user->avatar)
                <img src="{{ asset('assets/' . $user->avatar) }}" class="rounded mx-auto d-block" width="360" height="360">
            @else
                <img src="/images/avatar.png" class="rounded mx-auto d-block">
            @endif

            <ul>
                <li>Nazwa: {{ $user->name }}</li>
                <li>Email: {{ $user->email }}</li>
                <li>Telefon: {{ $user->phone }}</li>
            </ul>

            <a href="{{ route('me.edit') }}" class="btn btn-light">Edytuj dane</a>
        </div>
    </div>
@endsection
