<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <form method="post" action="{{ route('departments.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />
                                @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" class="block mt-1 w-full" name="description" required autofocus></textarea>
                                @error('description')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button class="ml-3" type="submit">
                                {{ __('Create Department') }}
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>
