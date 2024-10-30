<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form method="post" action="{{ route('tasks.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" name="name" required autofocus />
                                @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for="employees" :value="__('Employees')" />
                                <select id="employees" name="employee_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for="start_date" :value="__('Start Date')" />
                                <input id="start_date" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="date" name="start_date" required />
                                @error('start_date')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for="end_date" :value="__('End Date')" />
                                <input id="end_date" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="date" name="end_date" required />
                                @error('end_date')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for="statuses" :value="__('Statuses')" />
                                <select id="statuses" name="status" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}">{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" name="description" required autofocus></textarea>
                                @error('description')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button class="ml-3" type="submit">
                                {{ __('Create Task') }}
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <script>
        $("#employees").select2({
        });
    </script>
</x-app-layout>
