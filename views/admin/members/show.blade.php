@extends('layouts.admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 shadow-md rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">👤 Member Details</h2>

    <div class="mb-4">
        <strong class="text-gray-700">Name:</strong>
        <p class="text-gray-900">{{ $member->name }}</p>
    </div>

    <div class="mb-4">
        <strong class="text-gray-700">Email:</strong>
        <p class="text-gray-900">{{ $member->email }}</p>
    </div>

    <div class="mb-4">
        <strong class="text-gray-700">Phone:</strong>
        <p class="text-gray-900">{{ $member->phone ?? 'N/A' }}</p>
    </div>

    <div class="mb-4">
        <strong class="text-gray-700">Member Since:</strong>
        <p class="text-gray-900">
    {{ $member->member_since ? \Carbon\Carbon::parse($member->member_since)->format('d-m-Y') : 'N/A' }}
</p>

    </div>

    <div class="flex space-x-4">
        <a href="{{ route('admin.members') }}" class="bg-gray-500 hover:bg-gray-700 text-white py-2 px-4 rounded-lg shadow">◀️ Back</a>
    </div>
</div>
@endsection
