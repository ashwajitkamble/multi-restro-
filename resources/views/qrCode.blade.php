<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach ($store as $item)
       <h4>{{$item['store']}}</h4> 
       @foreach($item['tables'] as $table)
        <ul>
            <form action="{{ route('welcome', ['name' => $table['name']]) }}">
                <li>{{$table['name']}}</li>
                {{-- <li>{{ QrCode::generate(route('welcome')) }}</li> --}}
                <input type="submit" value="{{$table['name']}}">
            </form>            
        </ul>
       @endforeach
    @endforeach
</body>
</html>