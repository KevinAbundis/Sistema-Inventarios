@extends('emails.master')
@section('content')
<p>Hola: <strong>{{ $name }} {{ $lastname }}</strong></p>
<p>Te hemos asignado la siguiente contraseña para tu cuenta en el sistema de inventarios:</p>
<p><h2>{{ $password }}</h2></p>
<p>Para iniciar sesión haga clic en el siguiente botón: </p>
<p><a href="{{ url('/login') }}" style="display: inline-block; background-color: #134A9C; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none;">Iniciar Sesión</a></p>
<p>Si el botón anterior no le funciona, copie y pegue la siguiente URL en su navegador:</p>
<p>{{ url('/login') }}</p>
@stop