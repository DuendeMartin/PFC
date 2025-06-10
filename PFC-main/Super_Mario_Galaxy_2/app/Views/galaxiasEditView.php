<?php include("templates/parte1.php"); ?>
<?php
if (session()->get("administrador") == 1) {
    ?>
    <div class="row">
        <div class="col-12">
            <?= validation_list_errors();
            $errors = validation_errors();
            ?>

            <form action="<?php echo baseUrl(); ?>/galaxias/actualizar" method="post" enctype="multipart/form-data"
                id="form1">
                <input type="hidden" class="form-control" name="numero" id="numero" value="<?= $datos["numero"]; ?>">

                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <span id="nombre_error" class="text-danger"></span>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre"
                        value="<?= $datos["nombre"]; ?>">
                </div>

                <div class="mb-3">
                    <label for="mundo" class="form-label">Mundo</label>
                    <span id="mundo_error" class="text-danger"></span>
                    <select class="form-control" name="mundo" id="mundo">
                        <option value="1" <?php if ($datos["mundo"] === '1')
                            echo "selected" ?>>Mundo 1</option>
                            <option value="2" <?php if ($datos["mundo"] === '2')
                            echo "selected" ?>>Mundo 2</option>
                            <option value="3" <?php if ($datos["mundo"] === '3')
                            echo "selected" ?>>Mundo 3</option>
                            <option value="4" <?php if ($datos["mundo"] === '4')
                            echo "selected" ?>>Mundo 4</option>
                            <option value="5" <?php if ($datos["mundo"] === '5')
                            echo "selected" ?>>Mundo 5</option>
                            <option value="6" <?php if ($datos["mundo"] === '6')
                            echo "selected" ?>>Mundo 6</option>
                            <option value="extra" <?php if ($datos["mundo"] === 'extra')
                            echo "selected" ?>>Mundo extra</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <span id="imagen_error" class="text-danger"></span>
                        <input type="file" class="form-control" name="imagen" id="imagen">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <span id="descripcion_error" class="text-danger"></span>
                        <textarea class="form-control" name="descripcion" id="descripcion"
                            placeholder="Descripción"><?= $datos["descripcion"]; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="criterio_desbloquear" class="form-label">Criterio para desbloquear</label>
                    <span id="criterio_desbloquear_error" class="text-danger"></span>
                    <textarea class="form-control" name="criterio_desbloquear" id="criterio_desbloquear"
                        placeholder="Criterio para desbloquear"><?= $datos["criterio_desbloquear"]; ?></textarea>
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