@extends('layouts.admin')

@section('content')
    <h2 class="text-2xl font-bold mb-4">📋 Registered Members</h2>

    @if(session('success'))
        <p class="text-green-500 font-semibold">{{ session('success') }}</p>
    @endif

    <table class="w-full border-collapse bg-white shadow-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Phone</th>
                <th class="border px-4 py-2">Member Since</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($members as $member)
                <tr>
                    <td class="border px-4 py-2">{{ $member->id }}</td>
                    <td class="border px-4 py-2">{{ $member->name }}</td>
                    <td class="border px-4 py-2">{{ $member->email }}</td>
                    <td class="border px-4 py-2">{{ $member->phone }}</td>
                    <td class="border px-4 py-2">{{ $member->created_at->format('d-m-Y') }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.members.show', $member->id) }}" class="bg-gray-500 hover:bg-gray-700 text-white py-1 px-3 rounded">📄 View</a>
                        <a href="{{ route('admin.members.edit', $member->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded"> ✏️ Edit</a>
                        <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded">🗑️ Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
