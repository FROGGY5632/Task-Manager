<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use \Illuminate\Contracts\View\View;
use \Illuminate\Http\RedirectResponse;
use function redirect;


class TaskController extends Controller
{
    public function index(): View
    {
        $tasks = Task::paginate(10);

        //Считаем статистику по ВСЕМ задачам
        $stats = [
            'total' => Task::count(),
            'to_do' => Task::where('status', 'К выполнению')->count(),
            'in_progress' => Task::where('status', 'В процессе')->count(),
            'done' => Task::where('status', 'Готово')->count(),
        ];
        return view('tasks.index', ['tasks' => $tasks, 'stats' => $stats]);
    }

    public function create(): View
    {
        return view('tasks.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $task = new Task();
        $task->title = $data['title'];
        $task->status = 'К выполнению';
        $task->save();

        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('Success', 'Задача удалена!');
    }
}

