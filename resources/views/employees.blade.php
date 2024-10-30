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
                        <div class="controls">
                            <div class="search-container">
                                <input type="text" id="searchInput" placeholder="Search employees...">
                                <button id="searchButton">Search</button>
                            </div>                            <button id="createBtn">Create New Employee</button>
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
                                <td>{{ $employee->manager->fullName }}</td>
                                <td>
                                    <button>Edit</button>
                                    <button class="delete-button">Delete</button>
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
