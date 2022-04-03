@extends('layout.main')

@section('content')
    <h2 class="mt-4">Dashboard</h2>
    <div>
        Witaj {{ $user->name }}
    </div>
@endsection
