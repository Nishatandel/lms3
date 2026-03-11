<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Transaction Report</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

    <h2>Book Transactions Report</h2>
    <h3>Book: {{ $bookTitle }}</h3>
    <p>Date: {{ now()->format('Y-m-d H:i:s') }}</p>

    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Borrowed Date</th>
                <th>Due Date</th>
                <th>Returned Date</th>
                <th>Fine</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->borrowed_at }}</td>
                    <td>{{ $transaction->due_date }}</td>
                    <td>{{ $transaction->returned_at ?? 'Not Returned' }}</td>
                    <td>
    @if(!$transaction->returned_at && now()->gt($transaction->due_date))
        <span style="color: red; font-weight: bold;">₹{{ number_format($transaction->fine) }}</span>
    @else
        <span style="color: green;">No Fine</span>
    @endif
</td>

                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
