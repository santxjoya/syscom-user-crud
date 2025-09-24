<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body>
<div class="container container-table col-12 mt-5 p-4 rounded shadow-lg bg-white">
    <h2><i class="bi bi-people-fill"></i> Listado de Usuarios</h2>
    <hr class="mb-4">

    <table class="table table-striped table-hover table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Cargo</th>
                <th>Fecha de Ingreso</th>
                <th>Días Trabajados</th>
                <th>Contrato</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->use_name }}</td>
                <td>{{ $user->use_mail }}</td>
                <td>{{ optional($user->rol)->rol_name ?? 'Sin Rol' }}</td>
                <td>{{ $user->use_confirmation_date }}</td>
                <td>{{ $user->dias_trabajados }}</td>
                <td>
                    @if($user->use_contract)
                    <a href="{{ asset('storage/contracts/' . $user->use_contract) }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="bi bi-file-earmark-pdf-fill"></i> Ver
                    </a>
                    @else
                    <span class="text-muted">No disponible</span>
                    @endif
                </td>
                <td>
                    <!-- Botón Editar -->
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->use_id }}">
                        <i class="bi bi-pencil-fill"></i> Editar
                    </button>

                    <!-- Botón Eliminar -->
                    <form action="{{ route('users.destroy', $user->use_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar este usuario?')">
                            <i class="bi bi-trash-fill"></i> Eliminar
                        </button>
                    </form>
                </td>
            </tr>

            <!-- Modal de edición -->
            <div class="modal fade" id="editUserModal{{ $user->use_id }}" tabindex="-1" aria-labelledby="editUserLabel{{ $user->id }}" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <form action="{{ route('users.update', $user->use_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                      <h5 class="modal-title" id="editUserLabel{{ $user->use_id }}">Editar Usuario</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body">
                      <div class="mb-3">
                        <label for="use_name" class="form-label">Nombre</label>
                        <input type="text" name="use_name" class="form-control" value="{{ $user->use_name }}" required>
                      </div>

                      <div class="mb-3">
                        <label for="use_mail" class="form-label">Correo Electrónico</label>
                        <input type="email" name="use_mail" class="form-control" value="{{ $user->use_mail }}" required>
                      </div>

                      <div class="mb-3">
                        <label for="rol_id" class="form-label">Cargo</label>
                        <select name="rol_id" class="form-select" required>
                            <option value="">Selecciona un cargo</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->rol_id }}" {{ $user->rol_id == $rol->rol_id ? 'selected' : '' }}>
                                    {{ $rol->rol_name }}
                                </option>
                            @endforeach
                        </select>
                      </div>

                      <div class="mb-3">
                        <label for="use_confirmation_date" class="form-label">Fecha de Confirmación</label>
                        <input type="date" name="use_confirmation_date" class="form-control" value="{{ $user->use_confirmation_date }}" required>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
