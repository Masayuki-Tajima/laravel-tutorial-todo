<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::getActiveTasks();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|max:255',
            'due_date' => 'required|date'
        ]);
        $task = new Task();
        $task->task_name = $request->input('task_name');
        $task->due_date = $request->input('due_date');
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        Task::maskAsDeleted($id);

        return redirect()->route('tasks.index');
    }

    public function trash()
    {
        $task = Task::getTrashTasks();
        return view('tasks.trash', compact('task'));
    }

    public function recover($id)
    {
        Task::recoverTask($id);
        return redirect()->route('tasks.index');
    }

    public function deleteTrash()
    {
        Task::deleteTrashTaskPermanently();
        return redirect()->route('tasks.index');
    }
}
