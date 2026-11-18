@extends('layouts.app')
@section('content')
<div class="container" style="max-width:640px;margin:40px auto">
    <h2>Enlace no válido</h2>
    <p>No encontramos la solicitud asociada a este enlace.</p>
    <a href="{{ route('account-deletion.form') }}" class="btn btn-primary mt-3">Ir al formulario</a>
</div>
@endsection