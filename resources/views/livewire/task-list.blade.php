<div>
    <div>
        <select wire:model="status">
            <option value="all">All</option>
            <option value="Pending">Pending</option>
            <option value="In Progress">In Progress</option>
            <option value="Completed">Completed</option>
        </select>

        <select wire:model="sortBy">
            <option value="due_date">Sort by Due Date</option>
        </select>
    </div>

    <ul>
        @foreach($tasks as $task)
        <li>
            <h3>{{ $task->title }} ({{ $task->status }})</h3>
            <p>{{ $task->description }}</p>
            <p>Due: {{ $task->due_date }}</p>
            <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>
