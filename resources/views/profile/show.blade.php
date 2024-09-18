@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Profile</h1>

    @if (session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="form-control mt-1" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" id="email" class="form-control mt-1" value="{{ old('email', $user->email) }}" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update Profile</button>
    </form>

    <div class="mt-6">
        <h2 class="text-xl font-bold mb-4">API Tokens</h2>
        <p class="mb-2">Here you can manage your API tokens.</p>

        <form action="{{ route('tokens.store') }}" method="POST">
            @csrf
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Create New Token</button>
        </form>

        <ul class="mt-4">
            @foreach ($user->tokens as $token)
                <li class="flex items-center justify-between bg-gray-100 p-2 mb-2 rounded">
                    <span class="text-gray-700">{{ $token->name }}</span>
                    <form action="{{ route('tokens.destroy', $token->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600">Revoke</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
