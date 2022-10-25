@extends('plantilla')
@section('content')
<br>
    

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
    <table  class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>           
                <th scope="col">Precio</th>
                <th scope="col">Restaurante</th>
                <th scope="col">Operacions</th>
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

@endsection

