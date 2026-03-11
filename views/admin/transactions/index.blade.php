@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-semibold mb-4">🔄  All Transactions</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    @if(session('info'))
        <div class="bg-blue-200 text-blue-800 p-3 mb-4 rounded">
            {{ session('info') }}
        </div>
    @endif

    <table class="w-full border-collapse bg-white shadow-lg">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">User</th>
                <th class="border px-4 py-2">Book</th>
                <th class="border px-4 py-2">Borrowed At</th>
                <th class="border px-4 py-2">Due Date</th>
                <th class="border px-4 py-2">Returned At</th>
                <th class="border px-4 py-2">Fine</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td class="border px-4 py-2">{{ $transaction->user->name }}</td>
                    <td class="border px-4 py-2">{{ $transaction->book->title }}</td>
                    <td class="border px-4 py-2">{{ $transaction->borrowed_at }}</td>
                    <td class="border px-4 py-2">{{ $transaction->due_date }}</td>
                    <td class="border px-4 py-2">{{ $transaction->returned_at ?? 'Not Returned' }}</td>
                    <td class="border px-4 py-2">
    @if(!$transaction->returned_at && now()->gt($transaction->due_date))
        <span class="text-red-500 font-bold">₹{{ number_format($transaction->fine) }}</span>
    @else
        <span class="text-green-500">No Fine</span>
    @endif
</td>

                    <td class="border px-4 py-2">
                        <form action="{{ route('admin.transactions.calculateFine', $transaction->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Calculate Fine</button>
                        </form>
                        <br>
                        <!-- ✅ Download PDF for This Book -->
                        <a href="{{ route('admin.transactions.bookDownloadPDF', $transaction->book->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">
                            DownloadReport
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>
@endsection
