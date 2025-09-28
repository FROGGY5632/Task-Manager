<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite(['resources/sass/app.scss'])

    <title>My Fucking Tasks</title>
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <div class="text-center mb-4">
        <h1 class="display-5 fw-bold">Май файкинг таскс</h1>
        <p class="text-muted">Мой проект на Laravel</p>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @foreach($tasks as $task)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title mb-1">{{ $task->title }}</h5>
                        </div>
                        <span class="badge bg-primary">{{ $task->status }}</span>
                    </div>
                </div>
            @endforeach

            <div class="text-center mt-4">
                <a href="{{ route('tasks.create') }}" class="btn btn-success btn-lg">
                    ➕ Добавить задачу
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
