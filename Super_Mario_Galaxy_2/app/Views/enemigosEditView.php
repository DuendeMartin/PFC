<?php include("templates/parte1.php"); ?>
<?php
if (session()->get("administrador") == 1) {
    ?>
    <div class="row">
        <div class="col-12">
            <?= validation_list_errors();
            $errors = validation_errors();
            ?>

            <form action="<?php echo baseUrl(); ?>/enemigos/actualizar" method="post" enctype="multipart/form-data"
                id="form1">
                <input type="hidden" class="form-control" name="id" id="id" value="<?= $datos["id"]; ?>">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <span id="nombre_error" class="text-danger"></span>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"
                        value="<?= $datos["nombre"]; ?>">
                </div>

                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <span id="imagen_error" class="text-danger"></span>
                    <input type="file" class="form-control" name="imagen" id="imagen">
                </div>

                <div class="mb-3">
                    <label for="rol" class="form-label">Rol</label>
                    <span id="rol_error" class="text-danger"></span>
                    <select class="form-control" name="rol" id="rol">
                        <option value="Normal" <?php if ($datos["rol"] === 'Normal')
                            echo "selected" ?>>Normal</option>
                            <option value="Minijefe" <?php if ($datos["rol"] === 'Minijefe')
                            echo "selected" ?>>Minijefe</option>
                            <option value="Jefe" <?php if ($datos["rol"] === 'Jefe')
                            echo "selected" ?>>Jefe</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="invencible" class="form-label">Invencible</label>
                        <span id="invencible_error" class="text-danger"></span>
                        <select class="form-control" name="invencible" id="invencible">
                            <option value="0" <?php if ($datos["invencible"] === '0')
                            echo "selected" ?>>No</option>
                            <option value="1" <?php if ($datos["invencible"] === '1')
                            echo "selected" ?>>Sí</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <input type="submit" class="form-control" value="Aceptar" id="btnform11">
                    </div>

                </form>

            </div>
        </div>
    <?php
} else {
    ?>
    <p style="width: 100%; text-align: center; font-size: 50px;">No tienes permiso para editar</p>
    <?php
}
?>
<?php include("templates/parte2.php"); ?>