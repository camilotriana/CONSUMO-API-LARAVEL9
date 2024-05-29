<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <h1 class="text-center mt-3">Editar Inventario {{ $inventory['id'] }}</h1>

    <div class="container mt-3">
        <div class="card p-4">
            <form action="{{ route('inventory.update', $inventory['id']) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-lg-6">
                        <label for="serial" class="form-label">Serial</label>
                        <input type="text" class="form-control" id="serial" name="serial" maxlength="20" required
                            value="{{ $inventory['serial'] }}">
                    </div>
                    <div class="col-lg-6">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" maxlength="100"
                            required value="{{ $inventory['marca'] }}">
                    </div>

                    <div class="d-grid gap-2 col-lg-6 mt-3">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Actualizar registro</button>
                    </div>

                    <div class="d-grid gap-2 col-lg-6 mt-3">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#modalDelete"><i class="bi bi-trash"></i> Eliminar registro</button>
                    </div>
                </div>
            </form>
        </div>

        <a href="{{ route('inventory.index') }}" class="btn btn-sm btn-secondary mt-2"><i class="bi bi-arrow-left-square"></i>
            Atras</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('inventory.destroy', $inventory['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>¿Esta seguro que desea eliminar el registro?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                class="bi bi-x-lg"></i> Cancelar</button>
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar
                            registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
