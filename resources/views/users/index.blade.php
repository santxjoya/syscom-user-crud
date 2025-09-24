<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<body>

<div class="container">
    <div class="table-container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="fw-bold">Gestión de Usuarios</h2>
            <a href="{{ route('users.create') }}" class="btn btn-success">
                <i class="bi bi-person-plus"></i> Nuevo Usuario
            </a>
        </div>
        <hr>
        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                        <th>Cargo</th>
                        <th>Fecha de Ingreso</th>
                        <th>Días Trabajados</th>
                        <th>Contrato</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->use_id }}</td>
                            <td>{{ $user->use_name }}</td>
                            <td>{{ $user->use_mail }}</td>
                            <td>{{ $user->rol->rol_name ?? 'Sin rol' }}</td>
                            <td>{{ $user->use_confirmation_date }}</td>
                            <td>{{ $user->dias_trabajados }}</td>
                            <td>
                                @if($user->use_contract)
                                    <a href="{{ asset('storage/' . $user->use_contract) }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                        <i class="bi bi-file-earmark-pdf"></i> Ver PDF
                                    </a>
                                @else
                                    <span class="text-muted">No disponible</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <!-- Botón para editar -->
                                <button type="button" class="btn btn-sm btn-primary btn-action" data-bs-toggle="modal" data-bs-target="#editUserModal{{ $user->use_id }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </button>

                                <!-- Botón para eliminar -->
                                <form action="{{ route('users.destroy', $user->use_id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-action" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal para editar -->
                        <div class="modal fade" id="editUserModal{{ $user->use_id }}" tabindex="-1" aria-labelledby="editUserModalLabel{{ $user->use_id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title" id="editUserModalLabel{{ $user->use_id }}">Editar Usuario</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('users.update', $user->use_id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <label for="use_name" class="form-label">Nombre</label>
                                                    <input type="text" name="use_name" class="form-control" value="{{ $user->use_name }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="use_mail" class="form-label">Correo Electrónico</label>
                                                    <input type="email" name="use_mail" class="form-control" value="{{ $user->use_mail }}" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="rol_id" class="form-label">Cargo</label>
                                                    <select name="rol_id" class="form-select" required>
                                                        @foreach($roles as $rol)
                                                            <option value="{{ $rol->rol_id }}" {{ $user->rol_id == $rol->rol_id ? 'selected' : '' }}>
                                                                {{ $rol->rol_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="use_confirmation_date" class="form-label">Fecha de Ingreso</label>
                                                    <input type="date" name="use_confirmation_date" class="form-control" value="{{ $user->use_confirmation_date }}" required>
                                                </div>
                                            </div>
                                            <div class="mt-4 text-end">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
