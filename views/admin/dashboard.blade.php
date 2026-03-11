@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-5">📊 Dashboard</h1>

<div class="grid grid-cols-4 gap-6">
    <div class="bg-white p-4 shadow-md rounded-lg">
        <h2 class="text-xl font-semibold">📚 Total Books</h2>
        <p class="text-3xl font-bold">{{ $totalBooks }}</p>
    </div>

    <div class="bg-white p-4 shadow-md rounded-lg">
        <h2 class="text-xl font-semibold">📂 Total Categories</h2>
        <p class="text-3xl font-bold">{{ $totalCategories }}</p>
    </div>

    <div class="bg-white p-4 shadow-md rounded-lg">
        <h2 class="text-xl font-semibold">👤 Total Members</h2>
        <p class="text-3xl font-bold">{{ $totalMembers }}</p>
    </div>

    <div class="bg-white p-4 shadow-md rounded-lg">
        <h2 class="text-xl font-semibold">🔄 Active Transactions</h2>
        <p class="text-3xl font-bold">{{ $activeTransactions }}</p>
    </div>

    <div class="bg-white p-4 shadow-md rounded-lg">
        <h2 class="text-xl font-semibold">⏳ Overdue Books</h2>
        <p class="text-3xl font-bold text-red-600">{{ $overdueBooks }}</p>
    </div>
</div>

@endsection
