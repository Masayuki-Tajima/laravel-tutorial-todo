<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todoリストーゴミ箱</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <nav class="flex justify-between">
            <h1 class="text-2xl font-bold mb-4">ゴミ箱</h1>
        </nav>

        <ul class="list-disc pl-5">
            @foreach ($tasks as $task )
                <li class="flex justify-between mb-2">
                    <span>{{ $task->task_name }}</span>
                    <form action="{{ route('tasks.recover', $task->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">復元</button>
                    </form>
                </li>
            @endforeach
            @if(count($tasks) > 0)
                <form action="{{ route('tasks.deleteTrash') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white p-2 rounded">ゴミ箱を空にする</button>
                </form>
            @endif
        </ul>
        @if ($tasks->isEmpty())
            <p class="text-center">ゴミ箱は空です。</p>
        @endif
    </div>

</body>
</html>
