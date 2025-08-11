@extends('layouts.app')

@section('content')
    <div class="p-6 bg-white shadow">
        <h2 class="text-xl">Welcome, {{ auth()->user()->name }}</h2>
        <p class="mt-2">Post Messages Task</p>
    </div>
@endsection
