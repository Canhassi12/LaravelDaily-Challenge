<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee</title>
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

        @isset($response)
            <h3 class="bg-green-400 max-w-fit h-6">{{ $response }}</h3>
        @endisset

        @isset($error)
            <h3 class="text-red-500">{{ $error }}</h3>
        @endisset
        
        <x-employee-form :companies="$companies"/>

        <div>
            @isset($employees) 
                <table class="table-auto">
                    <tr class="ml-2">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Number</th>
                        <th>Company id</th>
                    </tr>
                    
                    @foreach ($employees as $employee)
                        <tr>
                            <td class="text-center border p-1"> {{ $employee->first_name }} {{$employee->last_name}}</td>
                            <td class="text-center border p-1">{{ $employee->email }}</td>
                            <td class="text-center border  p-1">{{ $employee->number}}</td>
                            <td class="text-center border  p-1">{{ $employee->company_id }}</td>
                            <td class="text-center border p-1">
                                <a href="{{route('employee.edit', $employee->id) }}">
                                    <button class="text-blue-500 hover:text-blue-900">edit</button>
                                </a>
                            </td>
                            <td class="text-center border p-1">
                                <form action="{{ route('employee.delete', $employee->id) }}" method="POST">
                                    @csrf
                                    <input class="hidden" name="_method" value="DELETE">
                                    <button class="text-blue-500 hover:text-blue-900">delete</button>
                                </form> 
                            </td>
                        </tr>
                    @endforeach 
                </table>
                {{ $employees->links() }}                   
            @endisset  
                   
        </div>
    </div>
</body>
</html>


