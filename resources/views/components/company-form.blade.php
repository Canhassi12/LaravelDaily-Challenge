@props([
    'name',
    'email',
    'logo',
    'id'
])

<form @isset($email) action="{{ route('company.update', $id) }}" method="POST" @endisset action="{{ route('company.store') }}" method="POST" class="bg-white flex flex-col justify-evenly shadow-md rounded px-8 pt-6 pb-8 mb-4 max-h-fit" enctype="multipart/form-data">
    <div class="mb-4">
        @isset($email)
            <input type="hidden" name="_method" value="PUT"> 
        @endisset
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Company name
        </label>
        <input @isset($name) value={{$name}} @endisset  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="name" type="text" placeholder="Company name">
        @if($errors->has('name')) <h3 class="text-red-500">{{$errors->first('name')}}</h3> @endif
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Email
        </label>
        <input @isset($email) value={{$email}} @endisset class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="text" placeholder="Email">
        @if($errors->has('email')) <h3 class="text-red-500">{{$errors->first('email')}}</h3> @endif
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2">
            Logo
        </label>
        <input @isset($logo) value={{$logo}} @endisset class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="logotipo" type="file" placeholder="Logo">
        @if($errors->has('logotipo')) <h3 class="text-red-500">{{$errors->first('logotipo')}}</h3> @endif
    </div>
    <div class="flex items-center justify-center">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            @isset($email) Update Company @endisset @if(!isset($email)) Register Company @endif
        </button>
    </div>
    @csrf
</form>
