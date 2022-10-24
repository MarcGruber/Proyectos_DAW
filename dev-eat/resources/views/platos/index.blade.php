<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Platos</title>
</head>
<body>
    

<div>
    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

<div>
    <a href="{{ route('platos.create') }}">Nou plat</a>     
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>           
                <th>Precio</th>
                <th>Restaurante</th>
                </tr>
        </thead>

            <tbody>
            @foreach ($platos as $plato)
            
       
                
       
            <tr>
                <td>{{ $plato->id }}</td>
                <td>{{ $plato->name }}</td>
                <td>{{$plato->precio}}</td>
                <td>{{$plato->restaurante_id}}</td>
               
                <td>                
                    <a href="{{ route('platos.show',$plato->id) }}">Mostrar</a> 
                 
                             
                    <a href="{{ route('platos.destroy',$plato->id) }}">Esborrar</a> 
                 
                             
                    <a href="{{ route('platos.edit',$plato->id) }}">Actualitzar</a> 
                 </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>