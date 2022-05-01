@extends('layout.main')

@section('content')
    <div class="card mt-3">
        <h5 class="card-header">{{ $user->name }}</h5>
        <div class="card-body">
            <img src="/images/avatar.png" class="rounded mx-auto d-block">
            <ul>
                <li>Nazwa: {{ $user->name }}</li>
                <li>Email: {{ $user->email }}</li>
                <li>Telefon: {{ $user->phone }}</li>
            </ul>

            <a href="{{ route('me.edit') }}" class="btn btn-light">Edytuj dane</a>
        </div>
    </div>
@endsection
