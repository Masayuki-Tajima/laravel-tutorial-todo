<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoリスト</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <nav class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">Todoリスト</h1>
            <a href="{{ route('tasks.trash') }}">ゴミ箱</a>
        </nav>

        <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="mb-2">
                <label for="task_name">タスク</label>
                <input type="text" name="task_name" id="task_name" class="border border-gray-300 p-2 w-full" required>
                <input type="datetime-local" name="due_date" class="border p-2 ml-2" required>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">追加</button>
            </div>
        </form>
    </div>

    <ul class="list-disc pl-5">
        @foreach ($tasks as $task )
            <li class="flex justify-between mb-2">
                <div>{{ $task->task_name }}:<span class="mx-5">{{ date('Y-m-d H:i', strtotime($task->due_date)) }}</span></div>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Done!</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
