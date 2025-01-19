<x-mail::message class="bg-dark">
# Introduction

You have created task please check by visit that page.

<x-mail::button :url="'http://127.0.0.1:8000/dashboard/tasks/'. $task->id ">
{{ __('Your Task')}}
</x-mail::button>

Thanks,<br>
{{ $task->user->name }} 
</x-mail::message>
