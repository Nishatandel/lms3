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
            <li><a href="{{ route('login') }}" class="py-2 px-3 hover:bg-blue-700 rounded">Login</a></li>
            <li><a href="{{ route('register') }}" class="py-2 px-3 hover:bg-blue-700 rounded">Register</a></li>
            <li>
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="py-0 px-3 hover:bg-red-600 rounded">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-semibold mb-4">Welcome, {{ $user->name }}!</h1>

        <div class="grid grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">📖 Borrowed Books</h2>
                <p class="text-3xl font-bold">{{ $totalBorrowed }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">⏳ Due Books</h2>
                <p class="text-3xl font-bold text-red-600">{{ $dueBooks }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold">📂 Total Categories</h2>
                <p class="text-3xl font-bold">{{ $totalCategories }}</p>
            </div>
        </div>
    </main>
</div>
@endsection
