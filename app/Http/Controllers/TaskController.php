<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Model\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return response()->json(['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->user_id = $user->id;
        $task->save();

        return response()->json(['task' => $task], 201);
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json(['task' => $task]);
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->save();

        return response()->json(['task' => $task]);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}

