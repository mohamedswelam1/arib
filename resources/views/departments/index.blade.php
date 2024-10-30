<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Departments') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Departments List</h1>
                        @if (session('success'))
                            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px;">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border-radius: 5px;">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="controls">
                            <div class="search-container">
                                <form method="GET" action="{{ route('departments.search') }}">
                                    <input type="text" name="search" placeholder="Search by name">
                                    <button type="submit">Search</button>
                                </form>
                            </div>
                            <a id="createBtn" href="{{route('departments.create')}}" class="button">Create New Department</a>
                        </div>
                        <table id="employeeTable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($departments as $department)
                                <tr>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->description }}</td>
                                    <td>
                                        <div class="flex gap-3">
                                            <a id="createBtn" href="{{route('departments.edit', $department->id)}}" class="button">Edit</a>
                                            <form method="POST" action="{{ route('departments.destroy', $department->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background-color: #cf0707" class="button">Delete</button>
                                            </form>
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
