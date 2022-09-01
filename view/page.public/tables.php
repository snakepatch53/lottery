<!DOCTYPE html>
<html lang="<?= $proyect['lang'] ?>">

<head>
    <?php include('./view/component.public/head.php') ?>
    <title>Tableros</title>
</head>

<body>
    <?php include('./view/component.public/header.php') ?>
    <?php include('./view/component.public/sidebar.php') ?>
    <main>
        <!-- CONTENT PAGE | INI -->
        <div class="pt-4 px-md-5 px-1">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= $proyect['url'] ?>home">Inicio</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tableros</li>
                </ol>
            </nav>
            <div class="card shadow">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <b>Tableros</b>
                        <button class="btn btn-outline-success" onclick="handleFunction.new()">
                            <i class="fa-solid fa-plus"></i>
                            <span>Crear nuevo</span>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover border">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th class="d-none d-md-table-cell" scope="col">#</th>
                                <th class="text-center text-md-left" scope="col">Nombre</th>
                                <th class="text-center text-md-left" scope="col">Tamaño</th>
                                <th class="d-none d-md-table-cell" scope="col">Fecha</th>
                                <th class="d-none d-md-table-cell" scope="col">Creacion</th>
                                <th class="text-center" scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="element-table-lottery"></tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- CONTENT PAGE | END -->

        <!-- MODAL | INI -->
        <!-- gift | ini -->
        <div class="modal fade" id="element-modalgift" tabindex="-1" aria-labelledby="element-modalgiftLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content needs-validation">
                    <div class="modal-header">
                        <h5 class="modal-title" id="element-modalgiftLabel">Premios</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- form | ini -->
                        <form class="needs-validation" id="element-giftform" action="#" method="POST" enctype="multipart/form-data" novalidate>
                            <input type="hidden" name="lottery_table_id" value="">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="validationServer01" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="validationServer01" placeholder="Gift" name="gift_name" required>
                                    <div class="invalid-feedback">
                                        Escribe el nombre del premio!
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="validationServer02" class="form-label">Imagen</label>
                                    <input type="file" class="form-control" id="validationServer02" name="gift_img">
                                </div>

                                <div class="col-md-12">
                                    <label for="validationCustom03" class="form-label">Usuario</label>
                                    <textarea class="form-control" id="validationCustom03" rows="1" name="gift_descr" placeholder="Escribe una descripcion"></textarea>
                                </div>
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary" onclick>Agregar</button>
                                </div>
                            </div>
                        </form>
                        <!-- form | end -->

                        <!-- table | ini -->
                        <table class="table table-striped table-hover border">
                            <thead class="bg-dark text-light">
                                <tr>
                                    <th class="d-none d-md-table-cell" scope="col">#</th>
                                    <th class="text-center text-md-left" scope="col">Nombre</th>
                                    <th class="d-none d-md-table-cell" scope="col">Imagen</th>
                                    <th class="d-none d-md-table-cell" scope="col">Ganador</th>
                                    <th class="text-center" scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="element-table-gift"></tbody>
                        </table>
                        <!-- table | end -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- gift | end -->

        <!-- form | ini -->
        <div class="modal fade" id="element-modalform" tabindex="-1" aria-labelledby="element-modalformLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content needs-validation" id="element-lotteryform" onsubmit="return false" novalidate>
                    <input type="hidden" name="lottery_table_id" value="0">
                    <input type="hidden" name="user_id" value="1"> <!-- PEDIENTE POR CAMBIAR -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="element-modalformLabel">Formulario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- form | ini -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="validationServer01" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="validationServer01" placeholder="Mark" name="lottery_table_name" required>
                                <div class="invalid-feedback">
                                    Escribe el nombre del evento!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationCustom02" class="form-label">Usuario</label>
                                <input type="datetime-local" class="form-control" id="validationCustom02" placeholder="@mark123" name="lottery_table_date" required>
                                <div class="invalid-feedback">
                                    Selecciona una fecha!
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="validationServer03" class="form-label">Numero de filas</label>
                                <input type="number" class="form-control" id="validationServer03" placeholder="Minimo 2" name="lottery_table_rows" min="2" max="26" value="2" required>
                                <div class="invalid-feedback">
                                    Minimo 2, maximo 26!
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="validationServer03" class="form-label">Numero de columnas</label>
                                <input type="number" class="form-control" id="validationServer03" placeholder="Minimo 2" name="lottery_table_columns" min="2" max="26" value="2" required>
                                <div class="invalid-feedback">
                                    Minimo 2, maximo 26!
                                </div>
                            </div>
                        </div>
                        <!-- form | end -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- form | end -->

        <!-- confirm | ini -->
        <div class="modal fade" id="element-modalconfirm" tabindex="-1" aria-labelledby="element-modalconfirmLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="element-modalconfirmLabel">Eliminar registro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estas seguro de eliminar este registro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="crudFunction.delete()">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- confirm | end -->
        <!-- MODAL | END -->
    </main>
</body>
<foot>
    <?php include('./view/component.public/foot.php') ?>
    <script src="<?= $proyect['url'] ?>control/script.public/tables.js"></script>
</foot>

</html>