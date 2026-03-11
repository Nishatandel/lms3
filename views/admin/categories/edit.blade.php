@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">✏️ Edit Category</h2>

    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('POST')

        <div class="mb-4">
            <label class="block font-semibold mb-2">Category Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ $category->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Current Image</label>
            @if($category->image)
                <img src="{{ asset('storage/'.$category->image) }}" alt="Category Image" class="w-32 h-32 object-cover rounded">
            @endif
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Upload New Image</label>
            <input type="file" name="image" class="w-full border rounded p-2">
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Update Category</button>
    </form>
@endsection
