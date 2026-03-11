<!DOCTYPE html>
<html>
<head>
    <title>Transaction Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Library Transaction Report</h2>
    <table>
        <thead>
            <tr>
                <th>User</th>
                <th>Book</th>
                <th>Borrowed At</th>
                <th>Due Date</th>
                <th>Returned At</th>
                <th>Fine</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->book->title }}</td>
                    <td>{{ $transaction->borrowed_at }}</td>
                    <td>{{ $transaction->due_date }}</td>
                    <td>{{ $transaction->returned_at ?? 'Not Returned' }}</td>
                    <td>
                        @if(!$transaction->returned_at && now()->gt($transaction->due_date))
                            ${{ $transaction->fine ?? '0.00' }}
                        @else
                            No Fine
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
