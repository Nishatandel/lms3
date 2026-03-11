@extends('layouts.user')

@section('content')
<div class="h-screen bg-gray-100 flex flex-col">
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
                    <button type="submit" class="py-0 px-3 hover:bg-red-600 rounded">
                         Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <main class="flex-1 p-6">
        <h1 class="text-3xl font-semibold mb-4">📖 Available Books</h1>

        <form action="{{ route('user.books') }}" method="GET" class="mb-4">
            <input type="text" name="search" value="{{ request()->search }}" class="border px-4 py-2 rounded" placeholder="Search by title, author, or ISBN" />
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
        </form>

        <table class="w-full border-collapse bg-white shadow-lg">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Author</th>
                    <th class="border px-4 py-2">ISBN</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    @php
                        $isBorrowed = $borrowedBooks->contains('book_id', $book->id);
                    @endphp
                    <tr>
                        <td class="border px-4 py-2">
                            <img src="{{ asset('storage/' . $book->image) }}" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="border px-4 py-2">{{ $book->title }}</td>
                        <td class="border px-4 py-2">{{ $book->author }}</td>
                        <td class="border px-4 py-2">{{ $book->isbn }}</td>
                        <!-- 👇 This is the new category column -->
                       <td class="border px-4 py-2">{{ $book->category->name ?? 'N/A' }}</td>

                        <td class="border px-4 py-2">
                            <span class="px-2 py-1 text-white rounded {{ $isBorrowed ? 'bg-red-500' : 'bg-green-500' }}">
                                {{ $isBorrowed ? 'Borrowed' : 'Available' }}
                            </span>
                        </td>
                        <td class="border px-4 py-2">
                            @if(!$isBorrowed)
                                <form action="{{ route('user.books.borrow', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">📥 Borrow</button>
                                </form>
                            @else
                                <button class="bg-gray-400 text-white px-3 py-1 rounded cursor-not-allowed" disabled>
                                    🚫 Borrowed
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h2 class="text-2xl font-semibold mt-8 mb-4">📌 Your Borrowed Books</h2>
        @if($borrowedBooks->isEmpty())
            <p class="text-gray-600">You have not borrowed any books yet.</p>
        @else
            <div class="overflow-x-auto bg-white shadow-lg rounded-lg">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="border px-6 py-3 text-left text-sm font-semibold">Image</th>
                            <th class="border px-6 py-3 text-left text-sm font-semibold">Title</th>
                            <th class="border px-6 py-3 text-left text-sm font-semibold">Category</th>
                            <th class="border px-6 py-3 text-left text-sm font-semibold">Due Date</th>
                            <th class="border px-6 py-3 text-left text-sm font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
            @foreach($borrowedBooks as $borrowedBook)
             <tr class="hover:bg-gray-100">
                <td class="border px-6 py-4">
                     <img src="{{ asset('storage/' . $borrowedBook->book->image) }}" class="w-16 h-16 object-cover rounded">
                </td>
                <td class="border px-6 py-4">{{ $borrowedBook->book->title }}</td>
                <td class="border px-6 py-4">{{ $borrowedBook->book->category->name ?? 'N/A' }}</td>
                <td class="border px-6 py-4">{{ $borrowedBook->due_date }}</td>
                <td class="border px-6 py-4">
                  <form action="{{ route('user.books.return', $borrowedBook->book_id) }}" method="POST">
                      @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                           🔄 Return
                        </button>
                  </form>
                </td>
             </tr>
            @endforeach
            </tbody>
               </table>
            </div>
        @endif
    </main>
</div>
@endsection
