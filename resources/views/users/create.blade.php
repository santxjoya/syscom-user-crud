<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Registro de usuarios</title>
</head>
<body>
<div class="container col-6 mt-5 p-4 rounded shadow-lg">
    <h2>Registro de Usuario</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="use_name" class="form-label">Nombre</label>
            <input type="text" name="use_name" class="form-control" value="{{ old('use_name') }}" required>
        </div>

        <div class="mb-3">
            <label for="use_mail" class="form-label">Correo Electrónico</label>
            <input type="email" name="use_mail" class="form-control" value="{{ old('use_mail') }}" required>
        </div>

        <div class="mb-3">
            <label for="rol_id" class="form-label">Cargo</label>
            <select name="rol_id" class="form-select" required>
            <option value="">Selecciona un cargo</option>
            <option value="1" {{ old('rol_id') == 1 ? 'selected' : '' }}>Jefe</option>
            <option value="2" {{ old('rol_id') == 2 ? 'selected' : '' }}>Empleado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="use_confirmation_date" class="form-label">Fecha de Confirmación</label>
            <input type="date" name="use_confirmation_date" class="form-control" value="{{ old('use_confirmation_date') }}" required>
        </div>

        <div class="d-flex justify-content-center mt-4 mb-3">
            <button type="submit" class="btn btn-primary px-5">Registrar</button>
        </div>
    </form>
</div>
</body>
</html>
