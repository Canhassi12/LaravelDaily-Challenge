<form action="{{ route('employee.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Firstname
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="firstname" type="text" placeholder="FirsName">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Lastname
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="lastname" type="text" placeholder="LastName">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Email
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Number
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="number" type="text" placeholder="Number">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Choose company:</label>
        <select name="company" id="">
            <option value="1">fodase</option>
            <option value="2">fodas1e</option>
            <option value="3">fodas21e</option>
        </select>

    </div>
    <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Register Employee
        </button>
    </div>
    @csrf
</form>