@extends('layouts.auth')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 shadow-md rounded-lg">
    <h2 class="text-2xl font-bold mb-4">Login</h2>

    @if ($errors->any())
        <div class="text-red-500 mb-4">
            <p>{{ $errors->first() }}</p>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <label class="block">Email:</label>
        <input type="email" name="email" class="w-full border p-2 rounded mb-4" required>

        <label class="block">Password:</label>
        <input type="password" name="password" class="w-full border p-2 rounded mb-4" required>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded w-full">Login</button>
    </form>
</div>
@endsection
