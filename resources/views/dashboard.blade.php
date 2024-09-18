@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Dashboard') }}
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div id="notification-bar" class="bg-yellow-300 text-yellow-900 dark:bg-yellow-500 dark:text-yellow-900 p-4 rounded-lg flex justify-between items-center shadow-sm">
                <div>
                    <span>{{ __("You're logged in!") }}</span>
                </div>
                <button onclick="document.getElementById('notification-bar').style.display='none'" class="text-yellow-900 font-bold text-lg">&times;</button>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Task Management System</h3>

                    <div class="flex space-x-4">
                        <!-- View All Tasks Button -->
                        <a href="{{ route('tasks.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                            View All Tasks
                        </a>

                        <!-- Create New Task Button -->
                        <a href="{{ route('tasks.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                            Create New Task
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
