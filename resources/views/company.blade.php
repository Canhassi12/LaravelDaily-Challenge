<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Company</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <a href="http://127.0.0.1:8000/">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">
            Dashboard
        </button>    
    </a>
    <div class="flex justify-center mt-20">
        @isset($messages)
            <h3 class="text-red-500">{{ $messages }}</h3>
        @endisset

        @isset($error)
            <h3 class="text-red-500">{{ $error }}</h3>
        @endisset

        @isset($response)
            <h3 class="bg-green-400 max-w-fit h-6">{{ $response }}</h3>
        @endisset
        
        <div class="flex flex-col">
            <x-company-form>
        

            </x-company-form>
            <div>
                @isset($companies) 
                    <table class="table-auto">
                        <tr>
                            <th>Company</th>
                            <th>Email</th>
                            <th>logotipo</th>
                        </tr>
                        
                        @foreach ($companies as $company)
                            <tr>
                                <td class="text-center border p-1"> {{ $company->name }}</td>
                                <td class="text-center border p-1">{{ $company->email }}</td>
                                <td class="text-center border  p-1">{{ $company->logotipo}}</td>
                                <td class="text-center border p-1">
                                    <a href="{{route('company.edit', $company->id) }}">
                                        <button class="text-blue-500 hover:text-blue-900">edit</button>
                                    </a>
                                </td>
                                <td class="text-center border p-1"> 
                                   <form action="{{ route('company.destroy', $company->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        {{-- <input class="hidden" name="_method" value="DELETE"> --}}
                                        <button class="text-blue-500 hover:text-blue-900">delete</button>
                                    </form> 
                                </td>
                    
                                
                            </tr>
                        @endforeach 
                    </table>
                    {{ $companies->links() }}                   
                @endisset         
            </div>
        </div>
    </div>
</body>
</html>
