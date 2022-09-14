<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex justify-center mt-20">
        <x-employee-form>
    

        </x-employee-form>

        @isset($messages)
            <h3 class="text-red-500">{{ $messages }}</h3>
        @endisset

        @isset($response)
            <h3 class="bg-green-400 max-w-fit h-6">{{ $response }}</h3>
        @endisset
        
    </div>
 
</body>
</html>


