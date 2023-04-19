<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="flex">
            <div class="w-1/4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 flex flex-col">

                    <h2 class="p-3 text-lg font-bold">Admin Panel</h2>
                    <hr>

                    <a href="/dashboard" class="p-3">
                        <span style="color:#1D2A4D;">Companies</span>
                    </a>
                    <hr>
                    <a href="/dashboard/employees" class="p-3">
                        <span style="color:#1D2A4D;">Employees</span>
                    </a>

                </div>
            </div>



            <div class="w-3/4 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
