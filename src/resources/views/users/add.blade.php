<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
<br>
                <form class="p-6 space-y-4" method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div>
                        <label for="name" class="block mb-1 font-medium">Name</label>
                        <input 
                            type="text" 
                            name="name" 
                            id="name"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >
                    </div>
                    <div>
                        <label for="email" class="block mb-1 font-medium">Email</label>
                        <input 
                            type="email" 
                            name="email" 
                            id="email"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >
                    </div>
                    <div>
                        <label for="password" class="block mb-1 font-medium">Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2"
                        >
                    </div>
                    <input 
                        type="submit"
                        name="Submit"
                        value="Add User"
                        class="bg-blue-500 text-white px-6 py-2 rounded-lg">
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
