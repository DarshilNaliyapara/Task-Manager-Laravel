<form action="{{ Route::currentRouteName() === 'tasks.edit' ? route('tasks.update', $task) : route('tasks.store')  }}"
    method="POST">
    @csrf
    @if (Route::currentRouteName() === 'tasks.edit')
        @method('PATCH')
    @endif
    <div
        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
        <textarea
            class="block flex-1 border-0 bg-transparent py-1.5 px-3 text-white placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
            name="tasks" id="tasks" type="text" value="{{ old('tasks', $task->tasks) }}"
            placeholder="Enter your task">{{ old('tasks', $task->tasks) }}</textarea>

    </div>
    @error('tasks')
        <p class="text-red-500 font-bold italic "> {{ $message }}</p>
    @enderror
    <x-primary-button class="dark:bg-green-700 dark:text-black mt-2">
        @if (Route::currentRouteName() === 'tasks.edit')
            Save
        @else
            Add Task
        @endif </x-primary-button>
        @if (Route::currentRouteName() === 'tasks.edit')
        <a href="{{ route('dashboard') }}" class="text-gray-400 ml-2">Cancel</a>
        @endif
</form>


@include('tasks.table')