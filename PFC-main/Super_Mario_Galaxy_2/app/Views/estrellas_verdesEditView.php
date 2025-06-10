<?php include("templates/parte1.php"); ?>
<?php
if (session()->get("administrador") == 1) {
    ?>
    <div class="row">
        <div class="col-12">
            <?= validation_list_errors();
            $errors = validation_errors();
            ?>

            <form action="<?php echo baseUrl(); ?>/estrellas_verdes/actualizar" method="post" enctype="multipart/form-data"
                id="form1">
                <input type="hidden" class="form-control" name="galaxia" id="galaxia" value="<?= $datos["galaxia"]; ?>">
                <input type="hidden" class="form-control" name="numero" id="numero" value="<?= $datos["numero"]; ?>">

                <div class="mb-3">
                    <label for="mision_incluyente" class="form-label">Misión incluyente</label>
                    <span id="mision_incluyente_error" class="text-danger"></span>
                    <?php echo form_dropdown('mision_incluyente', $optionsMisiones, rellenarDato($errors, $datos, "mision_incluyente"), 'class="form-control" id="mision_incluyente" '); ?>
                </div>

                <div class="mb-3">
                    <label for="ubicacion" class="form-label">Ubicación</label>
                    <span id="ubicacion_error" class="text-danger"></span>
                    <textarea class="form-control" name="ubicacion" id="ubicacion"
                        placeholder="Ubicación"><?= $datos["ubicacion"]; ?></textarea>
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