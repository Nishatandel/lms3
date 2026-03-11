<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Library Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-900 text-white h-screen p-5">
            <h2 class="text-xl font-bold mb-5">Library Admin</h2>
            <ul>
                <li class="mb-3"><a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 hover:bg-gray-700">📊 Dashboard</a></li>
                <li class="mb-3"><a href="{{ route('admin.books') }}" class="block py-2 px-3 hover:bg-gray-700">📚 Manage Books</a></li>
                <li class="mb-3"><a href="{{ route('admin.categories') }}" class="block py-2 px-3 hover:bg-gray-700">📂 Manage Categories</a></li>
                <li class="mb-3"><a href="{{ route('admin.members') }}" class="block py-2 px-3 hover:bg-gray-700">👤 Manage Members</a></li>
                {{-- <li class="mb-3"><a href="{{ route('admin.reports') }}" class="block py-2 px-3 hover:bg-gray-700">📊 Library Reports</a></li> --}}
                <li class="mb-3"><a href="{{ route('admin.transactions.index') }}" class="block py-2 px-3 hover:bg-gray-700">🔄 Transactions & Reports</a></li>
                <li class="mb-3"><a href="{{ route('admin.settings') }}" class="block py-2 px-3 hover:bg-gray-700">⚙️ Settings</a></li>
                <li class="mb-3">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left py-2 px-3 hover:bg-red-600">
                            🚪LogOut
                        </button>
                    </form>              
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            @yield('content')
        </div>
    </div>
    
</body>
</html>
