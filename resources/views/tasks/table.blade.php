<div class="overflow-x-auto mt-5">
    <table class="min-w-full table-auto border-collapse border border-gray-200 overflow-hidden rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-50 text-gray-700">
                <th class="border border-gray-300 px-6 py-3 text-left rounded-tl-lg font-semibold">Id</th>
                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Created By</th>
                <th class="border border-gray-300 px-6 py-3 text-left font-semibold">Task</th>
                <th class="border border-gray-300 px-6 py-3 text-center rounded-tr-lg font-semibold">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr class="text-white bg-gray-900 hover:bg-gray-200 hover:text-black">
                    <td class="border border-gray-300 px-6 py-3">{{ $task->id }}</td>
                    <td class="border border-gray-300 px-6 py-3">{{ $task->user->name }}</td>
                    <td class="border border-gray-300 px-6 py-3">
                        <a href="{{ route('tasks.show', $task) }}" class="text-blue-600 hover:text-blue-800 font-medium">{{ $task->tasks }}</a>
                    </td>
                    <td class="border border-gray-300 px-6 py-3 text-center">
                        @if ($task->user_id === auth()->id())
                        <a href="{{ route('tasks.edit', $task) }}" class="text-green-600 hover:text-green-800 mr-4 font-medium">Edit</a>
                        <button form="delete-task" class="text-red-600 hover:text-red-800 font-medium">
                            Delete
                        </button>
                        @else
                        Not for you
                        @endif
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" id="delete-task" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-5">
    {{ $tasks->links() }}
</div>
