@extends('layouts.app')
@section('content')
<div class="container" style="max-width:640px;margin:40px auto">
    <h2>✅ Ya confirmado</h2>
    <p>Ya recibimos tu confirmación@if(!empty($email)) para <strong>{{ $email }}</strong>@endif. No necesitas hacer nada más.</p>
</div>
@endsection