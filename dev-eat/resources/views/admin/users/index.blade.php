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
</div>
<br>
<div>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th  scope="col">Id</th>
                <th scope="col">Name</th>           
                <th scope="col">Email</th>
                <th scope="col">Role</th>
                </tr>
        </thead>

            <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
               
                <td>                
                <a href="{{ route('users.show',$user->id) }}"><button type="button" class="btn btn-secondary">Mostrar</button></a> 
                
                <a href="{{ route('users.destroy',$user->id) }}"><button type="button" class="btn btn-danger">Borrar</button></a> 
                            
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('pagination::bootstrap-4') }}
</div>

@endsection