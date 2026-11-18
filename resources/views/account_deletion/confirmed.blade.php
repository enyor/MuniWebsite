@extends('layouts.app')
@section('content')
<div class="container" style="max-width:640px;margin:40px auto">
    <h2>✅ Solicitud confirmada</h2>
    <p>
        Hemos recibido tu confirmación@if(!empty($email)) para la cuenta <strong>{{ $email }}</strong>@endif.
    </p>
    <p>
        @if(!empty($deleted))
            Tu cuenta y los datos asociados han sido eliminados.
        @else
            Los datos se eliminarán en un máximo de 30 días, salvo registros que debamos conservar por obligación legal (facturas, etc.).
        @endif
    </p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Volver al inicio</a>
</div>
@endsection