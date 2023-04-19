<x-app-layout>
    <div class="py-12">

        <div class="flex justify-center">
            <div class="p-5 w-3/4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-center text-4xl p-3 font-bold m-5">Employee Details</h1>
                <h2 class="text-center text-2xl p-3">First Name : {{ $employee[0]->first_name }}</h2>
                <h2 class="text-center text-2xl p-3">Last Name : {{ $employee[0]->last_name }}</h2>
                <h2 class="text-center text-2xl p-3">Email : {{ $employee[0]->email }}</h2>
                <h2 class="text-center text-2xl p-3">Phone Number : {{ $employee[0]->phone }}</h2>
                <h2 class="text-center text-2xl p-3">Company : {{ $employee[0]->name }}</h2>
            </div>
        </div>
    </div>

</x-app-layout>
