{{-- @extends('layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold">📊 Admin Dashboard</h1>
    <p>Welcome to the Library Management System Admin Panel.</p>
@endsection --}}

@extends('layouts.user')

@section('content')
<h1>Welcome User! 📚</h1>
<a href="{{ route('logout') }}" 
   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
   class="text-red-500">Logout</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>
@endsection

