<?php include('./model/library/users.php'); ?>
<!DOCTYPE html>
<html lang="<?= $proyect['lang'] ?>">

<head>
    <?php include('./view/component.public/head.php') ?>
    <title>Inicio</title>
</head>

<body>
    <?php include('./view/component.public/header.php') ?>
    <?php include('./view/component.public/sidebar.php') ?>
    <!-- CONTENT PAGE | INI -->
    <main class="pt-4 px-md-5 px-1">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= $proyect['url'] ?>home">Inicio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
            </ol>
        </nav>
        <div class="card shadow">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <b>Usuarios</b>
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
                            <th class="d-none d-md-table-cell" scope="col">Usuario</th>
                            <th class="d-none d-md-table-cell" scope="col">Tipo</th>
                            <th class="text-center" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="element-table-user"></tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- CONTENT PAGE | END -->

    <!-- MODAL | INI -->
    <!-- form | ini -->
    <div class="modal fade" id="element-modalform" tabindex="-1" aria-labelledby="element-modalformLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content needs-validation" id="element-userform" onsubmit="return false" novalidate>
                <input type="hidden" name="user_id" value="0">
                <div class="modal-header">
                    <h5 class="modal-title" id="element-modalformLabel">Formulario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- form | ini -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="validationServer01" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="validationServer01" placeholder="Mark" name="user_name" required>
                            <div class="invalid-feedback">
                                Escribe tu nombre!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Tipo</label>
                            <select class="form-select" id="validationCustom02" name="user_type" required>
                                <option selected disabled value="">Seleccionar</option>
                                <?php foreach ($user_type as $key => $value) { ?>
                                    <option value="<?= $key ?>"><?= $value ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                Selecciona una opcion.
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="@mark123" name="user_user" required>
                            <div class="invalid-feedback">
                                Escribe un nombre de usuario!
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Contraseña</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                <input class="form-control" id="validationCustom04" name="user_pass" placeholder="Contraseña" type="password" required>
                                <span class="input-group-text" style="cursor: pointer" id="togglePassword" onclick="handleFunction.togglePassword(this)">
                                    <i class="fa fa-eye"></i>
                                </span>
                            </div>
                            <div class="invalid-feedback">
                                Escribe una contraseña!
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
</body>
<foot>
    <?php include('./view/component.public/foot.php') ?>
    <script src="<?= $proyect['url'] ?>control/script.public/user.js"></script>
</foot>

</html>