@extends('emails.master')
@section('content')
<p>Hola: <strong>{{ $name }} {{ $lastname }}</strong></p>
<p>El presente correo electrónico le ayudará reestablecer la contraseña de su cuenta en el sistema de inventarios.</p>
<p>Para continuar haga clic en el siguiente botón de color azul e ingrese el siguiente código:</p>
<p><h2>{{ $code }}</h2></p>
<p><a href="{{ url('/reset?email='.$email) }}" style="display: inline-block; background-color: #134A9C; color: #fff; padding: 12px; border-radius: 4px; text-decoration: none;">Resetear mi contraseña</a></p>
<p>Si el botón anterior no le funciona, copie y pegue la siguiente URL en su navegador:</p>
<p>{{ url('/reset?email='.$email) }}</p>
@stop