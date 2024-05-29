<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <h1 class="text-center mt-3">Inventario</h1>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Serial</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    {!! $tableInventory !!}
                </tbody>
            </table>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#modalNew"><i
                    class="bi bi-plus-lg"></i> Agregar registro</button>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('inventory.store') }}" method="POST">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registro nuevo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-2">
                            <div class="col-lg-12">
                                <label for="serial" class="form-label">Serial</label>
                                <input type="text" class="form-control" id="serial" name="serial" maxlength="20" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="marca" class="form-label">Marca</label>
                                <input type="text" class="form-control" id="marca" name="marca" maxlength="100" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i
                                class="bi bi-x-lg"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Agregar
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
