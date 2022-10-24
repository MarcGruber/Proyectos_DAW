<div>
    @if (session('success'))
        {{ session('success') }}
            
    @endif

    @if (session('error'))           
        {{ session('error') }}            
    @endif
</div>

<div>
    <a href="{{ route('restaurantes.create') }}">Nou planeta</a>
</div>

<div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>           
                <th>Capacidad</th>
                <th>Operacions</th>
                </tr>
        </thead>

            <tbody>
            @foreach ($restaurantes as $restaurante)
            <tr>
                <td>{{ $restaurante->id }}</td>
                <td>{{ $restaurante->name }}</td>
                <td>{{ $restaurante->capacidad }}</td>
               
                <td>                
                   <a href="{{ route('restaurantes.show',$restaurante->id) }}">Mostrar</a> 
                
                            
                   <a href="{{ route('restaurantes.destroy',$restaurante->id) }}">Esborrar</a> 
                
                            
                   <a href="{{ route('restaurantes.edit',$restaurante->id) }}">Actualitzar</a> 
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>