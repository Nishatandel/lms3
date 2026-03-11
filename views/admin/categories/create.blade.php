@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">➕ Add New Category</h2>

    @if (session('success'))
        <div class="bg-green-500 text-white p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-2">Category Image</label>
            <input type="file" name="image" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Category Name</label>
            <input type="text" name="name" class="w-full border rounded p-2 @error('name') border-red-500 @enderror" placeholder="Category Name" value="{{ old('name') }}">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Description</label>
            <textarea name="description" class="w-full border rounded p-2">{{ old('description') }}</textarea>
        </div> 

        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Add Category</button>
    </form>
@endsection
