@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $task->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <div class="form-group">
        <label for="due_date">Due Date</label>
            <input type="date" name="due_date" id="due_date" class="form-control" value="{{ old('due_date', $task->due_date) }}">
        </div>


        <button type="submit" class="btn btn-success">Update Task</button>
    </form>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dueDateInput = document.getElementById('due_date');
        if (!dueDateInput.value) {
            dueDateInput.value = "{{ $task->due_date }}";
        }
    });
</script>
@endsection
