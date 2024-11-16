<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- <h1>Welcome : {{date('d,m,y') ?? 'Guest'}}</h1> -->
    {{-- <h1>Welcome :
        @isset($name)
        {{$name}}
            
        @endisset
</h1>
    @if ($name=='')
        {{'Name is empty'}}
        @elseif($name=='Abhishek')
        {{'Welcome Boss'}}

        @else
        {{'Welcome guest'}}
    @endif
@unless ($name!='Abhishek')
   <h1>Welcome Boss</h1>
@endunless --}}
{{-- @for ($i = 0; $i < 10; $i++)
   <h1>Welcome Boss</h1>
    
@endfor --}}


 {{-- ARRAY --}}
@php
    $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
@endphp

@for ($i = 0; $i < count($array); $i++)
    @if ($i==3)
        {{-- @continue --}}
        @break;
    @endif
{{    $i}}
@endfor

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>