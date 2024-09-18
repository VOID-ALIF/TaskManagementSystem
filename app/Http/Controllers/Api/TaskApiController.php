<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskApiController extends Controller
{
    // Fetch all tasks (with optional filters for status and sorting)
    public function index(Request $request)
    {
        $query = Task::query();

        if ($request->has('status') && $request->status != 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('sort_by')) {
            $query->orderBy('due_date', $request->sort_by == 'desc' ? 'desc' : 'asc');
        } else {
            $query->orderBy('due_date', 'asc');
        }

        $tasks = $query->get();

        return response()->json([
            'success' => true,
            'data' => $tasks,
        ]);
    }

    // Fetch a single task
    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return response()->json(['success' => false, 'message' => 'Task not found'], 404);
        }

        return response()->json(['success' => true, 'data' => $task]);
    }

    // Create a new task
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create([
            'user_id' => Auth::id(),
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'due_date' => $validatedData['due_date'],
        ]);

        return response()->json(['success' => true, 'data' => $task], 201);
    }

    // Update a task
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:Pending,In Progress,Completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($validatedData);

        return response()->json(['success' => true, 'data' => $task]);
    }

    // Delete a task
    public function destroy(Task $task)
    {
        $task->delete();

        return response()->json(['success' => true, 'message' => 'Task deleted successfully']);
    }
}
