<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <title>Task Manager</title>
</head>
<body>

<div class="container-fluid mt-4">
    <div class="row align-items-start">

        <!-- Левая колонка: заголовок + список задач -->
        <div class="col-lg-8">
            <div class="text-center mb-4">
                <h1 class="display-4 fw-bold mb-2">Список задач</h1>
                <p class="text-muted mb-0">Мой проект на Laravel • {{ $tasks->count() }} задач</p>
            </div>

            <div class="task-list">
                @foreach($tasks as $task)
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">{{ $task->title }}</h5>
                            <div class="d-flex align-items-center gap-2">
                                <span class="badge bg-{{ strtolower($task->status) }}">
                                    {{ $task->status }}
                                </span>
                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-link text-danger p-0"
                                            onclick="deleteTask({{ $task->id }})">Удалить
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Правая колонка: кнопка + статистика -->
        <div class="col-lg-4">
            <div class="d-flex justify-content-center custom-margin-top mb-3">
                <a href="{{ route('tasks.create') }}" class="btn btn-success btn-lg px-4 py-2">
                    ➕ Добавить задачу
                </a>
            </div>

            <!-- Статистика -->
            <div class="card shadow-sm mt-5">
                <div class="card-header bg-dark text-white">
                    <h6 class="mb-0">Статистика</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-2 align-items-center">
                        <span>Всего задач:</span>
                        <span class="badge bg-primary">{{ $tasks->count() }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="text-muted">К выполнению:</span>
                        <span
                            class="badge bg-К-выполнению float-end">{{ $tasks->where('status', 'К выполнению')->count() }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="text-muted">В процессе:</span>
                        <span
                            class="badge bg-В-процессе float-end">{{ $tasks->where('status', 'В процессе')->count() }}</span>
                    </div>
                    <div class="stat-item">
                        <span class="text-muted">Готово:</span>
                        <span class="badge bg-Готово float-end">{{ $tasks->where('status', 'Готово')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
