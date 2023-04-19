@extends('dashboard')

@section('content')
    <div class="mb-5 flex justify-between">



        <!-- Modal toggle -->
        <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
            class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Create New Company
        </button>

        @if (session('mssg'))
            <div class="flex justify-center">

                <h3 class="bg-green-400 text-white p-3 rounded-md">{{ session('mssg') }}</h3>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600 font-bold">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- Main modal -->
        <div id="authentication-modal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="px-6 py-6 lg:px-8">
                        <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create New Company</h3>
                        <form class="space-y-6" action="/dashboard/companies" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Company Name</label>
                                <input type="text" name="name" id="name" required
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>

                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Company Email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>

                            <div>
                                <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Website</label>
                                <input type="url" name="website" id="website"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>

                            <div>
                                <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Logo</label>
                                <input type="file" name="logo" id="logo"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                            </div>
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">CREATE
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">



        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-black text-white">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Company Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Company Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Logo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Website
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $company->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $company->email }}
                        </td>
                        <td class="px-6 py-4">

                            <img style="width:2rem; height:2rem; border-radius:50%;"
                                src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo">

                        </td>
                        <td class="px-6 py-4">
                            <a class="underline text-blue-600" href="{{ $company->website }}">Website Link</a>
                        </td>
                        <td class="px-6 py-4 flex">

                            <a href="/dashboard/companies/view/{{ $company->id }}"><i
                                    class="fa-solid fa-eye p-3 bg-yellow-300 rounded-md m-1"></i></a>
                            <a href="/dashboard/companies/edit/{{ $company->id }}"><i
                                    class="fa-solid fa-pen-to-square p-3 bg-cyan-300 rounded-md m-1"></i></a>
                            <form action="{{ route('company.destroy', $company->id) }}" method="POST"> @csrf
                                @method('DELETE')
                                <button class="/dashboard/companies/{{ $company->id }}" type="submit"
                                    onClick="return confirm('Do you really want to delete');"><i
                                        class="fa-solid fa-trash p-3 bg-red-500 rounded-md m-1 text-white"></i></button>
                            </form>


                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        {{ $companies->links() }}

    </div>
@endsection
