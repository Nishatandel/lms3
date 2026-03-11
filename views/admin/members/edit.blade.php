@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">✏️ Edit Member</h2>

    @if ($errors->any())
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4">
            <strong>Whoops! Something went wrong.</strong>
            <ul class="mt-2">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.members.update', $member->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Name:</label>
            <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('name', $member->name) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Email:</label>
            <input type="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('email', $member->email) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Phone:</label>
            <input type="text" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('phone', $member->phone) }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Member Since:</label>
            <input type="date" name="member_since" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('member_since', $member->member_since) }}" required>
        </div>

        <div class="flex items-center space-x-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow">✅ Update</button>
            <a href="{{ route('admin.members') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-6 rounded-lg shadow">❌ Cancel</a>
        </div>
    </form>
</div>
@endsection
