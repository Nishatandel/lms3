@extends('layouts.user')

@section('content')
<div class="h-screen bg-gray-100 flex flex-col">
    <!-- Navbar -->
    <nav class="bg-blue-800 text-white p-4 flex justify-between items-center">
        <h2 class="text-2xl font-bold">📚 User Panel</h2>
        <ul class="flex space-x-6">
            <li>
                <a href="{{ route('user.dashboard') }}" class="py-2 px-3 hover:bg-blue-700 rounded">🏠 Dashboard</a>
            </li>
            <li>
                <a href="{{ route('user.books') }}" class="py-2 px-3 hover:bg-blue-700 rounded">📖 My Books</a>
            </li>
            <li>
                <a href="{{ route('user.categories.index') }}" class="py-2 px-3 hover:bg-blue-700 rounded">📂 Categories</a>
            </li>
            <li>
                <a href="{{ route('user.profile') }}" class="py-2 px-3 hover:bg-blue-700 rounded">👤 Profile</a>
            </li>
            <li>
                <a href="{{route('login')}}" class="py-2 px-3 hover:bg-blue-700 rounded">Login</a>
            </li>
            <li>
                <a href="{{route('register')}}" class="py-2 px-3 hover:bg-blue-700 rounded">Register</a>
            </li>
            <li>
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="py-0 px-3 hover:bg-red-600 rounded">
                         Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Categories Title -->
    <h2 class="text-2xl font-bold mb-4 pl-8 pr-8">📂 Categories</h2> <!-- Added padding-left and padding-right -->

    {{-- Search Form --}}
    <form method="GET" action="{{ route('user.categories.index') }}" class="mb-4 pl-8 pr-8">
        <div class="flex space-x-4">
            <input type="text" name="search" class="border p-2 w-full sm:w-auto" placeholder="Search for categories" value="{{ request('search') }}">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Search</button>
        </div>
    </form>

    {{-- Categories Table --}}
    <div class="overflow-x-auto px-8"> <!-- Added padding-left and padding-right -->
        <table class="w-full border-collapse bg-white shadow-lg">
        <thead>
    <tr class="bg-gray-200">
        <th class="border px-4 py-2">Name</th>
        <th class="border px-4 py-2">Description</th>
        <th class="border px-4 py-2">Image</th>
    </tr>
</thead>
<tbody>
    @foreach($categories as $category)
        <tr>
            <td class="border px-4 py-2">{{ $category->name }}</td>
            <td class="border px-4 py-2">{{ $category->description }}</td>
            <td class="border px-4 py-2">
                @if($category->image)
                    <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" class="h-16 w-16 object-cover">
                @else
                    No Image
                @endif
            </td>
        </tr>
    @endforeach
</tbody>

        </table>
    </div>
</div>
@endsection
