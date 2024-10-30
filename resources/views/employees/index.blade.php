<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container">
                        <h1>Employees List</h1>
                        @if (session('success'))
                            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px;">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="controls">
                            <div class="search-container">
                                <form method="GET" action="{{ route('employees.search') }}">
                                    <input type="text" name="search" placeholder="Search by name or manager's name">
                                    <button type="submit">Search</button>
                                </form>
                            </div>
                            <a id="createBtn" href="{{route('employees.create')}}" class="button">Create New Employee</a>
                        </div>
                        <table id="employeeTable">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Full Name</th>
                                <th>Salary</th>
                                <th>Manager Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->fullName }}</td>
                                    <td>${{$employee->salary}}</td>
                                    <td>{{ $employee->manager?->fullName }}</td>
                                    <td>
                                        <div class="flex gap-3">
                                        <a id="createBtn" href="{{route('employees.edit', $employee->id)}}" class="button">Edit</a>
                                            <form method="POST" action="{{ route('employees.destroy', $employee->id) }}">
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
