@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">📂 Manage Categories</h2>

    <a href="{{ route('admin.categories.add') }}" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded mb-4 inline-block">
        ➕ Add Category
    </a>

    @if(session('success'))
        <p class="text-green-500">{{ session('success') }}</p>
    @endif

    <table class="w-full border-collapse bg-white shadow-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Description</th>
                <th class="border px-4 py-2">Image</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
    <tr>
        <td class="border px-4 py-2">{{ $category->name }}</td>
        <td class="border px-4 py-2">{{ $category->description }}</td>
        <td class="border px-4 py-2">
            @if($category->image)
                <img src="{{ asset('storage/'.$category->image) }}" alt="Category Image" class="w-16 h-16 object-cover rounded">
            @endif
        </td>
        <td class="border px-4 py-2">
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-700">✏️ Edit</a>
            <form action="{{ route('admin.categories.delete', $category->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-blue-700">🗑️ Delete</button>
            </form>
        </td>
    </tr>
@endforeach

        </tbody>
    </table>
@endsection
