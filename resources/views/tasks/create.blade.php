<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Создать задачу</title>
    @vite(['resources/sass/app.scss'])
</head>
<body>
<div class="d-flex justify-content-center align-items-start min-vh-100 pt-5">
    <div class="col-md-6">
        <div class="card">
            <form method="POST" action="{{ route('tasks.store') }}">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Поле ввода задачи -->
                <div class="mb-3">
                    <label for="title" class="text-center form-label">Название задачи</label>
                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        value="{{ old('title') }}"
                        minlength="3"
                        maxlength="255"
                        required
                    >
                    @error('title')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Блок выбора тегов -->
                <div class="mb-3">
                    <label class="form-label fw-bold text-center">Теги</label>
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        @forelse($tags as $tag)
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    name="tags[]"
                                    value="{{ $tag->id }}"
                                    id="tag-{{ $tag->id }}"
                                    @if(old('tags') && in_array($tag->id, old('tags')))
                                        checked
                                    @endif
                                >
                                <label class="form-check-label badge bg-secondary" for="tag-{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @empty
                            <p class="text-muted">Нет доступных тегов.</p>
                        @endforelse
                    </div>

                    @error('tags')
                    <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100">Добавить</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
