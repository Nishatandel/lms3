@extends('layouts.user')

@section('content')
<div class="h-screen bg-gray-100 flex flex-col">
    <!-- Navbar -->
    <nav class="bg-blue-800 text-white p-4 flex justify-between items-center">
        <h2 class="text-2xl font-bold">📚 User Panel</h2>
        <ul class="flex space-x-6">
            <li><a href="{{ route('user.dashboard') }}" class="py-2 px-3 hover:bg-blue-700 rounded">🏠 Dashboard</a></li>
            <li><a href="{{ route('user.books') }}" class="py-2 px-3 hover:bg-blue-700 rounded">📖 My Books</a></li>
            <li><a href="{{ route('user.categories.index') }}" class="py-2 px-3 hover:bg-blue-700 rounded">📂 Categories</a></li>
            <li><a href="{{ route('user.profile') }}" class="py-2 px-3 hover:bg-blue-700 rounded">👤 Profile</a></li>
            <li><a href="{{route('login')}}" class="py-2 px-3 hover:bg-blue-700 rounded">Login</a></li>
            <li><a href="{{route('register')}}" class="py-2 px-3 hover:bg-blue-700 rounded">Register</a></li>
            <li>
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="py-0 px-3 hover:bg-red-600 rounded">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-4">👤 My Profile</h1>

        <div class="bg-white shadow p-6 rounded-lg">
            <h2 class="text-xl font-bold mb-3">Your Profile Details</h2>

            @if($user)
                <p class="text-gray-700"><strong>Name:</strong> {{ $user->name }}</p>
                <p class="text-gray-700"><strong>Email:</strong> {{ $user->email }}</p>
                <p class="text-gray-700"><strong>Phone:</strong> {{ $user->phone ?? 'Not Provided' }}</p>
                <p class="text-gray-700"><strong>Member Since:</strong> {{ $user->created_at->format('d-m-Y') }}</p>
            @else
                <p class="text-gray-700">No user data found. Please login to see your profile details.</p>
            @endif
        </div>
    </div>
</div>
@endsection
