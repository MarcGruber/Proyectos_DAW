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
    <a href="{{ route('restaurantes.create') }}"><button type="button" class="btn btn-primary">Afegir Restaurant</button></a>
</div>
<br>
<div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th  scope="col">Id</th>
                <th scope="col">Name</th>           
                <th scope="col">Capacidad</th>
                <th scope="col">Operacions</th>
                </tr>
        </thead>

            <tbody>
            @foreach ($restaurantes as $restaurante)
            <tr>
                <td>{{ $restaurante->id }}</td>
                <td>{{ $restaurante->name }}</td>
                <td>{{ $restaurante->capacidad }}</td>
               
                <td>                
                   <a href="{{ route('restaurantes.show',$restaurante->id) }}"><button type="button" class="btn btn-secondary">Mostrar</button></a> 
                
                   <a href="{{ route('restaurantes.edit',$restaurante->id) }}"><button type="button" class="btn btn-secondary">Actualizar</button></a> 
                            
                   <a href="{{ route('restaurantes.destroy',$restaurante->id) }}"><button type="button" class="btn btn-danger">Borrar</button></a> 
                
                            
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $restaurantes->links('pagination::bootstrap-4') }}
</div>

@endsection