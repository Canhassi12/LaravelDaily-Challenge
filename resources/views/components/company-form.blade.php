<form action="{{ route('company.store') }}" method="POST" class="bg-white flex flex-col justify-evenly shadow-md rounded px-8 pt-6 pb-8 mb-4 max-h-fit">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Company name
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Company name">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Logo
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="logo" type="text" placeholder="Logo">
    </div>
    <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Register company
        </button>
    </div>
    @csrf
</form>