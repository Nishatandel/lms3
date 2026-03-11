@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-5">⚙️ Settings</h1>

@if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white p-6 shadow-md rounded-lg">
    @csrf

    <label class="block mb-3">
        <span class="text-gray-700">Library Name:</span>
        <input type="text" name="library_name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $setting->library_name ?? '' }}" required>
    </label>

    <label class="block mb-3">
        <span class="text-gray-700">Library Email:</span>
        <input type="email" name="library_email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $setting->library_email ?? '' }}" required>
    </label>

    <label class="block mb-3">
        <span class="text-gray-700">Opening Hours:</span>
        <input type="text" name="opening_hours" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" value="{{ $setting->opening_hours ?? '' }}" required>
    </label>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">💾 Save Changes</button>
</form>
@endsection
