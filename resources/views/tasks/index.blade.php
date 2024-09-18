@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Task List') }}
    </h2>
@endsection

@section('content')
    <div class="container">
        <!-- Task Management Title and Create Button -->
        <div class="flex items-center justify-between mb-4">
            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 text-center flex-grow">Task Management System</h1>
            <a href="{{ route('tasks.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Create New Task</a>
        </div>

        <!-- Filtering and Sorting Form -->
        <form method="GET" action="{{ route('tasks.index') }}" class="mb-6 flex items-center space-x-4">
            <!-- Filter by Status -->
            <select name="status" class="form-control bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md">
                <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>All Statuses</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ request('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>

            <!-- Sort by Due Date -->
            <select name="sort_by" class="form-control bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border-gray-300 dark:border-gray-600 rounded-md">
                <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>Due Date: Oldest First</option>
                <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Due Date: Newest First</option>
            </select>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Apply</button>
        </form>

        <!-- Task List Table -->
        <table class="min-w-full table-auto mt-6">
            <thead class="bg-gray-50 dark:bg-gray-700">
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase">Title</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase">Description</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase">Status</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase">Due Date</th>
                    <th class="px-6 py-3 border-b-2 border-gray-200 dark:border-gray-600 text-left text-sm font-semibold text-gray-900 dark:text-gray-100 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($tasks as $task)
                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-900 transition duration-300 ease-in-out">
                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100">{{ $task->title }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100">{{ $task->description }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100">{{ $task->status }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 text-sm text-gray-900 dark:text-gray-100">{{ $task->due_date }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 dark:border-gray-700 text-sm">
                            <a href="{{ route('tasks.edit', $task->id) }}" class="bg-yellow-400 text-white px-4 py-2 rounded-md hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
