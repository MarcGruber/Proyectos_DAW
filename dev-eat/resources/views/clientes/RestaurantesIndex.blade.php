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
    @if (auth()->user()->role != 'cliente')           
    <a href="{{ route('restaurantes.create') }}"><button type="button" class="btn btn-primary">Afegir Restaurant</button></a>
    @endif
   
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
                   <a href="{{ route('Clientrestaurantes.show',$restaurante->id) }}"><button type="button" class="btn btn-secondary">Mostrar</button></a>                 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $restaurantes->links('pagination::bootstrap-4') }}
</div>

@endsection