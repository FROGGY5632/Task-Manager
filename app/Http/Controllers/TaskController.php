<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use function redirect;


class TaskController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        $tasks = Task::paginate(10);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        return view('tasks.create');
    }

    public function store(StorePostRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $task = new Task();
        $task->title = $data['title'];
        $task->status = 'К выполнению';
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task): \Illuminate\Http\RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('Success', 'Задача удалена!');
    }
}

