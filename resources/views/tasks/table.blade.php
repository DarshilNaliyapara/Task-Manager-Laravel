<div class="overflow-x-auto mt-5">
    <table class="min-w-full table-auto border-collapse border border-gray-200  rounded-md">
      
        <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="border border-gray-300 px-4 py-2 text-left">Id</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Created By</th>
                <th class="border border-gray-300 px-4 py-2 text-left">Task</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr class=" text-white-800">
                    <td class="border border-gray-300 px-4 py-2">{{ $task->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $task->user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('tasks.show', $task) }}" class="text-blue-500 hover:underline">{{ $task->tasks }}</a>
                    </td>
                 
                    <td class="border border-gray-300 px-4 py-2 text-center">
                      
                        <a href="{{ route('tasks.edit', $task) }}" class="text-green-500 hover:text-green-700 mr-4">Edit</a>
                        <button onclick="document.getElementById('delete-task').submit();" class="text-red-500 hover:text-red-700">
                            Delete
                        </button>
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