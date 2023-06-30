<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Model\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function index()
    {
         // Get the authenticated user
        $user = Auth::user();

        // Retrieve tasks belonging to the logged-in user
        $tasks = Task::where('user_id', $user->id)->get();

        return response()->json(['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->start_date = $request->input('startDate'); // Add start_date field
        $task->end_date = $request->input('endDate'); // Add end_date field
        $task->severity = $request->input('severity'); // Add severity field
        $task->user_id = $user->id;
        $task->save();
        return response()->json(['task' => $task], Response::HTTP_CREATED);
    }

    public function show($id)
    {
        try {
            $task = Task::findOrFail($id);
            return response()->json(['task' => $task]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->title = $request->input('title');
            $task->description = $request->input('description');
            $task->start_date = $request->input('startDate'); // Add start_date field
            $task->end_date = $request->input('endDate'); // Add end_date field
            $task->severity = $request->input('severity'); // Add severity field
            $task->save();

            return response()->json(['task' => $task]);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }
    }

    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            return response()->json(['message' => 'Task deleted successfully']);
        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }
    }
}

