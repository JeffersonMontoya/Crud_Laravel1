<!DOCTYPE html>
<html lang="en">

<head>
    <title>CRUD Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- Agregar FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body style="background-color: #eeeeee;">

    <h1 class="text-center p-3 bg-dark text-light">CRUD Laravel</h1>

    @if (session('Correcto'))
        <div class="alert alert-success rounded p-3 text-center">
            <strong>¡Correcto!</strong> {{ session('Correcto') }}
        </div>
    @endif

    @if (session('Incorrecto'))
        <div class="alert alert-danger rounded p-3 text-center">
            <strong>¡Incorrecto!</strong> {{ session('Incorrecto') }}
        </div>
    @endif

    <div class="modal fade" id="modalregistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="exampleModalLabel">Registrar Datos</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('crud.create') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="form-label">Id:</label>
                            <input type="text" name="id" class="form-control" id="id">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" id="nombre">
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="text" name="precio" class="form-control" id="precio">
                        </div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="text" name="cantidad" class="form-control" id="cantidad">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="p-5">
        <div class="table-responsive">
            <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalregistrar">Agregar Producto</button>

            <table class="table table-striped table-bordered table-hover">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datos as $dato)
                        <tr>
                            <td>{{ $dato->id }}</td>
                            <td>{{ $dato->nombre }}</td>
                            <td>{{ $dato->precio }}</td>
                            <td>{{ $dato->cantidad }}</td>
                            <td>
                                <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#modaleditar_{{ $dato->id }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('crud.delete', $dato->id) }}" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>

                            <!-- Modal Editar -->
                            <div class="modal fade" id="modaleditar_{{ $dato->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-warning text-white">
                                            <h5 class="modal-title" id="exampleModalLabel">Modificar Datos</h5>
                                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('crud.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $dato->id }}">
                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombre:</label>
                                                    <input type="text" name="nombre" class="form-control" value="{{ $dato->nombre }}" id="nombre">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="precio" class="form-label">Precio:</label>
                                                    <input type="text" name="precio" class="form-control" value="{{ $dato->precio }}" id="precio">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="cantidad" class="form-label">Cantidad:</label>
                                                    <input type="text" name="cantidad" class="form-control" value="{{ $dato->cantidad }}" id="cantidad">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-warning">Modificar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
