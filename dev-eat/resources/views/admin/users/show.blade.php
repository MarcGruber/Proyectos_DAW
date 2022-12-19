@extends('plantilla')
@section('content')
<br>
<h2 style="text-transform: uppercase;">{{ $user->name }}</h2>
  
<hr>
<div class="d-flex flex-row">
	<strong>Nombre: {{ $user->name }}</strong>
	 <br>
	<strong style="margin-left: 30px;">EMAIL: {{ $user->email }}</strong>
	
</div>



@endsection