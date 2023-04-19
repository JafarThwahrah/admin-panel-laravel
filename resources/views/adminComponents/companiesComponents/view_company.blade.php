<x-app-layout>
    <div class="py-12">

        <div class="flex justify-center">
            <div class="p-5 w-3/4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="text-center text-4xl p-3 font-bold m-5">Company Details</h1>

                <h2 class="text-center text-2xl p-3">Company Name : {{ $company->name }}</h2>
                <h2 class="text-center text-2xl p-3">Company Email : {{ $company->email }}</h2>
                <h2 class="text-center text-2xl p-3">Website : {{ $company->website }}</h2>
                <h2 class="text-center text-2xl flex justify-center p-3">Logo : <img
                        style="width:2rem; height:2rem; border-radius:50%;" src="{{ asset('storage/' . $company->logo) }}"
                        alt="Company Logo"></h2>

            </div>
        </div>
    </div>

</x-app-layout>
