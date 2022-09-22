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
    @isset($messages)
        <h3 class="text-red-500">{{ $messages }}</h3>
    @endisset

    @isset($error)
        <h3 class="text-red-500">{{ $error }}</h3>
    @endisset
    
    <div>
        <x-employee-form :firstname="$employee->first_name" :lastname="$employee->last_name" :email="$employee->email" :number="$employee->number" :id="$employee->id" :companies="$companies"/>
    </div>
</body>
</html>
