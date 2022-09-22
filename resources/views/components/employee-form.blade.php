@props([
    'companies',
    'firstname',
    'lastname',
    'email',
    'number',
    'id',
])

<form @isset($id) action="{{ route('employee.update', $id) }}" @endisset action="{{ route('employee.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <div class="mb-4">
        @isset($id)
            <input type="hidden" name="_method" value="PUT"> 
        @endisset
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Firstname
        </label>
        <input @isset($firstname) value={{$firstname}} @endisset class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="first_name" type="text" placeholder="FirsName">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Lastname
        </label>
        <input @isset($lastname) value={{$lastname}} @endisset class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="last_name" type="text" placeholder="LastName">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Email
        </label>
        <input @isset($email) value={{$email}} @endisset class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Number
        </label>
        <input @isset($number) value={{$number}} @endisset class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="number" type="text" placeholder="Number">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">Choose company:</label>
        <select name="company_id" id="">
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }} ID: {{ $company->id }}</option>
            @endforeach
        </select>

    </div>
    <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Register Employee
        </button>
    </div>
    @csrf
</form>