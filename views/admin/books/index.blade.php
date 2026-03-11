@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">📚 Book List</h2>
    <a href="{{ route('admin.books.add') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded mb-4 inline-block">
        ➕ Add Books
    </a>

    <table class="w-full border-collapse border border-gray-300 shadow-lg">
    <thead class="bg-gray-200">
        <tr>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Title</th>
            <th class="border px-4 py-2">Author</th>
            <th class="border px-4 py-2">ISBN</th>
            <th class="border px-4 py-2">Published Year</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Status</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
            <tr class="text-center">
                <td class="border px-4 py-2">
                    <img src="{{ asset('storage/' . $book->image) }}" class="w-16 h-16 object-cover rounded">
                </td>
                <td class="border px-4 py-2">{{ $book->title }}</td>
                <td class="border px-4 py-2">{{ $book->author }}</td>
                <td class="border px-4 py-2">{{ $book->isbn }}</td>
                <td class="border px-4 py-2">{{ $book->published_year }}</td>
                <td class="border px-4 py-2">{{ $book->category->name ?? 'N/A' }}</td>

                <!-- <td class="border px-4 py-2">
                    <span class="px-2 py-1 text-white rounded 
                        {{ $book->status == 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                        {{ ucfirst($book->status) }}
                    </span>
                </td> -->
                <td class="border px-4 py-2">
                        <form action="{{ route('admin.books.toggleStatus', $book->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit"
                                class="px-3 py-1 rounded text-white
                                    {{ $book->status === 'available' ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }}">
                                {{ ucfirst($book->status) }}
                            </button>
                        </form>
                    </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('admin.books.edit', $book->id) }}" 
                        class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">✏️Edit</a>

                    <form action="{{ route('admin.books.delete', $book->id) }}" method="POST" 
                        class="inline-block" onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                            class="bg-red-500 text-white px-1
                             py-1 rounded hover:bg-red-700">🗑️Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection
