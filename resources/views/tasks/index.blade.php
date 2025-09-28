<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <title>My Fucking Tasks</title>
</head>
<body>

<div class="container-fluid mt-4">
    <div class="row align-items-start">

        <!-- Левая колонка: заголовок + список задач -->
        <div class="col-lg-8">
            <div class="mb-4">
                <h1 class="fw-bold mb-2">Список задач</h1>
                <p class="text-muted mb-0">Мой проект на Laravel • {{ $tasks->count() }} задач</p>
            </div>

            <div class="task-list">
                @foreach($tasks as $task)
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">{{ $task->title }}</h5>
                            <span class="badge bg-{{ str_replace('_', '', strtolower($task->status)) }}">
                                {{ $task->status }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Правая колонка: кнопка + статистика -->
        <div class="col-lg-4">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('tasks.create') }}" class="btn btn-success btn-lg px-4 py-2">
                    ➕ Добавить задачу
                </a>
            </div>

            <!-- Статистика -->
            <div class="card shadow-sm mt-0">
                <div class="card-header bg-dark text-white">
                    <h6 class="mb-0">Статистика</h6>
                </div>
                <div class="card-body">
                    <div class="stat-item">
                        <span class="text-muted">Всего задач:</span>
                        <strong class="float-end">{{ $tasks->count() }}</strong>
                    </div>
                    <div class="stat-item">
                        <span class="text-muted">Todo:</span>
                        <span class="badge bg-todo float-end">{{ $tasks->where('status', 'todo')->count() }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="text-muted">In Progress:</span>
                        <span class="badge bg-inprogress float-end">{{ $tasks->where('status', 'in_progress')->count() }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="text-muted">Done:</span>
                        <span class="badge bg-done float-end">{{ $tasks->where('status', 'done')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
