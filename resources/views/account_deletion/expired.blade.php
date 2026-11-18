@extends('layouts.app')
@section('content')
<div class="container" style="max-width:640px;margin:40px auto">
    <h2>⏰ Enlace expirado</h2>
    <p>Este enlace de confirmación ya no es válido. Solicita uno nuevo desde el formulario.</p>
    <a href="{{ route('account-deletion.form') }}" class="btn btn-primary mt-3">Solicitar de nuevo</a>
</div>
@endsection