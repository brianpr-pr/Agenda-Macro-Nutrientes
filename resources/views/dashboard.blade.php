<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
        
        <br>
        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="h-96 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ ("Welcome to the Macro Nutrientes Scheduler") }}

                    <br>

                    <button class="active:shadow-none transition-all 
                    duration-150 active:translate-y-[2px] 
                    hover:bg-gray-100 button px-2 m-2 
                    rounded border-black border-2"><a href="/days">View Calendar</a></button>

                    <br>

                    <button class="active:shadow-none transition-all 
                    duration-150 active:translate-y-[2px] 
                    hover:bg-gray-100 button px-2 m-2 
                    rounded border-black border-2"><a href="/menus">View Menus</a></button>

                    <br>

                    <button class="active:shadow-none transition-all 
                    duration-150 active:translate-y-[2px] 
                    hover:bg-gray-100 button px-2 m-2 
                    rounded border-black border-2"><a href="/dishes">View Dishes</a></button>

                    <br>

                    <button class="active:shadow-none transition-all 
                    duration-150 active:translate-y-[2px] 
                    hover:bg-gray-100 button px-2 m-2 
                    rounded border-black border-2"><a href="/products">View Products</a></button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
