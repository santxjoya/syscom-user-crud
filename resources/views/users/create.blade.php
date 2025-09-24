<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
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

        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
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
                <div class="mb-3">
                     <label for="use_contract" class="form-label">Contrato (PDF)</label>
                    <input type="file" name="use_contract" class="form-control" accept="application/pdf">
                </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary px-5"><i class="bi bi-check-circle"></i> Registrar</button>
            </div>
        </form>
        @if(session('success'))
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
    });
</script>
@endif

<!-- Modal de confirmación -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="successModalLabel"><i class="bi bi-check-circle-fill"></i> ¡Éxito!</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        Usuario creado correctamente.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
