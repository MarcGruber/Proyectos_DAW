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
                <th>Operacions</th>
                </tr>
        </thead>

            <tbody>
            @foreach ($platos as $plato)
            <tr>
                <td>{{ $plato->id }}</td>
                <td>{{ $plato->name }}</td>
               
            
            </tr>
            @endforeach
        </tbody>
    </table>
</div>