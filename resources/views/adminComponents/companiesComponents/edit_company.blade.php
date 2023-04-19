<x-app-layout>
    <div class="py-12">

        <div class="flex justify-center">
            <div class="p-5 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="space-y-6" action="/dashboard/companies/{{ $company->id }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Company Name</label>
                        <input type="text" name="name" id="name" value="{{ $company->name }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>

                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Company Email</label>
                        <input type="email" name="email" id="email" value="{{ $company->email }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>

                    <div>
                        <label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Website</label>
                        <input type="url" name="website" id="website" value="{{ $company->website }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>

                    <div>
                        <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Logo</label>
                        <input type="file" name="logo" id="logo"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">UPDATE
                    </button>

                </form>
            </div>
        </div>
    </div>

</x-app-layout>
