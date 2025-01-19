<span class="font-bold text-lg">Created by {{ $task->user->name}}</span>
@unless ($task->created_at->eq($task->updated_at))
  <small class="text-sm">Edited </small>
@endunless
<div><small class="text-sm">{{ $task->created_at->format('j M Y, g:i a') }}</small>
</div>

<div class="mt-4">
    <p>
      Task:   {{ $task->tasks  }}
    </p>
  </div>
       