<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Tasks List</h1>
                        @if (session('success'))
                            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px;">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (auth()->user()->manager_id == null)
                        <div class="controls">
                            <a id="createBtn" href="{{route('tasks.create')}}" class="button">Create New Task</a>
                        </div>
                        @endif
                        <table id="taskTable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Assignee</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->name }}</td>
                                    <td>{{ $task->status }}</td>
                                    <td>{{ $task->start_date }}</td>
                                    <td>{{ $task->end_date }}</td>
                                    <td>{{ $task->employee->full_name }}</td>
                                    <td>
                                        <div class="flex gap-3">
                                        <a id="createBtn" href="{{route('tasks.edit', $task->id)}}" class="button">Edit</a>
                                            @if (auth()->user()->manager_id == null)
                                            <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: #cf0707" class="button">Delete</button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
