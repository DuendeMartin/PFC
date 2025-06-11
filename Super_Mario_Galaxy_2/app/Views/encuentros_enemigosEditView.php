<?php include("templates/parte1.php"); ?>
<?php
if (session()->get("administrador") == 1) {
    ?>
    <div class="row">
        <div class="col-12">
            <?= validation_list_errors();
            $errors = validation_errors();
            ?>

            <form action="<?php echo baseUrl(); ?>/encuentros_enemigos/actualizar" method="post"
                enctype="multipart/form-data" id="form1">
                <input type="hidden" class="form-control" name="id" id="id" value="<?= $datos["id"]; ?>">

                <div class="mb-3">
                    <label for="galaxia" class="form-label">Galaxia</label>
                    <?php echo form_dropdown('galaxia', $optionsGalaxias, rellenarDato($errors, $datos, "galaxia"), 'class="form-control" id="galaxia" '); ?>
                </div>

                <div class="mb-3">
                    <label for="estrella_verde" class="form-label">Estrella Verde</label>
                    <select class="form-control" name="estrella_verde" id="estrella_verde">
                        <option value="0" <?php if ($datos["estrella_verde"] === '0')
                            echo "selected" ?>>No</option>
                            <option value="1" <?php if ($datos["estrella_verde"] === '1')
                            echo "selected" ?>>Sí</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mision" class="form-label">Misión</label>
                    <?php echo form_dropdown('mision', $optionsMisiones, rellenarDato($errors, $datos, "mision"), 'class="form-control" id="mision" '); ?>
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