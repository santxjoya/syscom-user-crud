<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-md-6 card-form">
        <h2 class="text-center mb-4"><i class="bi bi-person-fill-add"></i> Registro de Usuario</h2>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="mb-3 mt-3">
                <label for="use_name" class="form-label"><i class="bi bi-person"></i> Nombre</label>
                <input type="text" name="use_name" class="form-control" value="{{ old('use_name') }}" placeholder="Ingrese su nombre" required>
            </div>

            <div class="mb-3">
                <label for="use_mail" class="form-label"><i class="bi bi-envelope"></i> Correo Electrónico</label>
                <input type="email" name="use_mail" class="form-control" value="{{ old('use_mail') }}" placeholder="usuario@ejemplo.com" required>
            </div>

            <div class="mb-3">
                <label for="rol_id" class="form-label"><i class="bi bi-briefcase"></i> Cargo</label>
                <select name="rol_id" class="form-select" required>
                    <option value="">Selecciona un cargo</option>
                    <option value="1" {{ old('rol_id') == 1 ? 'selected' : '' }}>Jefe</option>
                    <option value="2" {{ old('rol_id') == 2 ? 'selected' : '' }}>Empleado</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="use_confirmation_date" class="form-label"><i class="bi bi-calendar-check"></i> Fecha de Confirmación</label>
                <input type="date" name="use_confirmation_date" class="form-control" value="{{ old('use_confirmation_date') }}" required>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary px-5"><i class="bi bi-check-circle"></i> Registrar</button>
            </div>
        </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
