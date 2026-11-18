@include('layouts.app')
<div class="container" style="max-width:640px;margin:40px auto">
    <h2>Eliminar mi cuenta y datos</h2>

    @if(session('status'))
        <div class="alert alert-info">{{ session('status') }}</div>
    @endif

    <p>
        Puedes solicitar la eliminación de tu cuenta y de los datos personales asociados.
        Te enviaremos un correo para confirmar la solicitud antes de procesarla.
    </p>

    <ul>
        <li><strong>Se eliminarán:</strong> perfil, direcciones, historial de pedidos, tokens de notificación.</li>
        <li><strong>Se conservarán</strong> (por obligación legal): facturas y registros fiscales durante el plazo exigido por ley.</li>
        <li><strong>Plazo:</strong> hasta 30 días desde la confirmación.</li>
    </ul>

    <form method="POST" action="{{ route('account-deletion.submit') }}">
        @csrf
        <div class="form-group">
            <label for="email">Correo electrónico de tu cuenta</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email') }}" required>
            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" name="confirm" id="confirm" value="1" required>
            <label class="form-check-label" for="confirm">
                Entiendo que esta acción es irreversible y que algunos datos deben conservarse por ley.
            </label>
            @error('confirm')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <button type="submit" class="btn btn-danger mt-3">Solicitar eliminación</button>
    </form>
</div>
@include('layouts.nav')