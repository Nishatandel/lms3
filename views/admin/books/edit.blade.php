@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">✏️ Edit Book</h2>
    <form method="POST" action="{{ route('admin.books.update', $book->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT') <!-- Important: Use @method('PUT') to tell Laravel it's a PUT request -->
    
    <select name="category_id" class="w-full border rounded p-2 mb-4" required>
    <option value="">Select Category</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
            {{ $category->name }}
        </option>
    @endforeach
</select>

    <input type="text" name="title" value="{{ $book->title }}" class="w-full border rounded p-2 mb-4">
    <input type="text" name="author" value="{{ $book->author }}" class="w-full border rounded p-2 mb-4">
    <input type="text" name="isbn" value="{{ $book->isbn }}" class="w-full border rounded p-2 mb-4">
    <input type="number" name="published_year" value="{{ $book->published_year }}" class="w-full border rounded p-2 mb-4">

    <select name="status" class="w-full border rounded p-2 mb-4">
        <option value="available" {{ $book->status == 'available' ? 'selected' : '' }}>Available</option>
        <option value="borrowed" {{ $book->status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
    </select>

    <input type="file" name="image" class="w-full border rounded p-2 mb-4">

    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">
        Update Book
    </button>
</form>



@endsection
