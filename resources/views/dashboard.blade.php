<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-center gap-20">
        <div class="flex items-center justify-center">
            <a href="http://127.0.0.1:8000/employee" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Register Employee
            </a>
        </div>
    
        <div class="flex items-center justify-center">
            <a href="http://127.0.0.1:8000/company" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Register company
            </a>
        </div>
    </div>
    
    
    <p class="text-center text-gray-500 text-xs mt-10">
        &copy;2022 Arthur Canhassi All rights reserved.
    </p>     
</x-app-layout>
