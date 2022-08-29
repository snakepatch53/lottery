<div class="container">
    <form class="row g-3 needs-validation" id="register-form" novalidate>
        <input type="hidden" name="usuario_id" value="<?= $usuario_id ?>">
        <input type="hidden" name="usuario_autorize" value="0">
        <input type="hidden" name="usuario_admin" value="0">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="validationCustom01" placeholder="Mark" name="usuario_nombres" value="<?= $usuario_nombres ?>" required>
            <div class="valid-feedback">
                ¡Se ve bien!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Apellidos</label>
            <input type="text" class="form-control" id="validationCustom02" placeholder="Anthony" name="usuario_apellidos" value="<?= $usuario_apellidos ?>" required>
            <div class="valid-feedback">
                ¡Se ve bien!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom03" class="form-label">Cedula</label>
            <input type="text" class="form-control" id="validationCustom03" placeholder="0704870371" name="usuario_cedula" value="<?= $usuario_cedula ?>" required>
            <div class="valid-feedback">
                ¡Se ve bien!
            </div>
            <div class="invalid-feedback">
                Ingrese un numero de cedula valido.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Celular</label>
            <input type="text" class="form-control" id="validationCustom04" placeholder="0980199932" name="usuario_telefono" value="<?= $usuario_telefono ?>" required>
            <div class="valid-feedback">
                ¡Se ve bien!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom05" class="form-label">Email</label>
            <input type="email" class="form-control" id="validationCustom05" placeholder="alguien@email.com" name="usuario_email" value="<?= $usuario_email ?>" required>
            <div class="valid-feedback">
                ¡Se ve bien!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom06" class="form-label">Genero</label>
            <select class="form-select" id="validationCustom06" name="usuario_genero" required>
                <option selected value="<?= $usuario_genero ?>"><?= $usuario_genero == "" ? "Selecciona una opcion" : $usuario_genero ?></option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
            </select>
            <div class="invalid-feedback">
                Selecciona una opción válida.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom07" class="form-label">Foto</label>
            <input class="form-control" id="validationCustom07" type="file" name="usuario_foto" accept="image/png, image/jpeg">
        </div>
        <div class="col-md-4">
            <label for="validationCustom08" class="form-label">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="validationCustom08" name="usuario_nacimiento" value="<?= $usuario_nacimiento ?>" required>
            <div class="valid-feedback">
                ¡Se ve bien!
            </div>
        </div>

        <div class="col-md-4">
            <label for="validationCustom09" class="form-label">Contraseña</label>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                <input class="form-control" id="validationCustom09" name="usuario_pass" placeholder="Contraseña" type="password" value="<?= $usuario_pass ?>" required>
                <span class="input-group-text" style="cursor: pointer" id="togglePassword">
                    <i class="fa fa-eye"></i>
                </span>
            </div>
            <div class="valid-feedback">
                ¡Se ve bien!
            </div>
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Acepto los términos y condiciones.
                </label>
                <div class="invalid-feedback">
                    Debe estar de acuerdo antes de enviar.
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Guardar</button>
        </div>
    </form>
</div>

<script src="<?= $proyect['url'] ?>control/script.public/checkin.js"></script>