@extends('layouts.admin')

@section('content')
<h2 class="text-2xl font-bold mb-4">➕ Add New Book</h2>

<form method="POST" action="{{ route('admin.books.store') }}" enctype="multipart/form-data">
    @csrf
    <select name="category_id" class="w-full border rounded p-2 mb-4" required>
    <option value="">Select Category</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
</select>

    <input type="text" name="title" placeholder="Title" required class="w-full border rounded p-2 mb-4">
    <input type="text" name="author" placeholder="Author" required class="w-full border rounded p-2 mb-4">
    <input type="text" name="isbn" placeholder="ISBN" required class="w-full border rounded p-2 mb-4">
    <input type="number" name="published_year" placeholder="Published Year" required class="w-full border rounded p-2 mb-4">
    <input type="file" name="image" class="w-full border rounded p-2 mb-4">
    <select name="status" class="w-full border rounded p-2 mb-4">
        <option value="available">Available</option>
        <option value="borrowed">Borrowed</option>
    </select>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Add Book</button>
</form>

@endsection
