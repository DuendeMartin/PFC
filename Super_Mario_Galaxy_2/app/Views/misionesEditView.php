<?php include("templates/parte1.php"); ?>
<?php
if (session()->get("administrador") == 1) {
    ?>
    <div class="row">
        <div class="col-12">
            <?= validation_list_errors();
            $errors = validation_errors();
            ?>

            <form action="<?php echo baseUrl(); ?>/misiones/actualizar" method="post" enctype="multipart/form-data"
                id="form1">
                <input type="hidden" class="form-control" name="galaxia" id="galaxia" value="<?= $datos["galaxia"]; ?>">
                <input type="hidden" class="form-control" name="numero" id="numero" value="<?= $datos["numero"]; ?>">

                <div class="mb-3">
                    <label for="titulo" class="form-label">Título</label>
                    <span id="titulo_error" class="text-danger"></span>
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título"
                        value="<?= $datos["titulo"]; ?>">
                </div>

                <div class="mb-3">
                    <label for="objetivo" class="form-label">Objetivo</label>
                    <span id="objetivo_error" class="text-danger"></span>
                    <textarea class="form-control" name="objetivo" id="objetivo"
                        placeholder="Objetivo"><?= $datos["objetivo"]; ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="tipo_estrella" class="form-label">Tipo de estrella</label>
                    <select class="form-control" name="tipo_estrella" id="tipo_estrella">
                        <option value="Estrella normal" <?php if ($datos["tipo_estrella"] === 'Estrella normal')
                            echo "selected" ?>>Estrella normal</option>
                            <option value="Maxiestrella" <?php if ($datos["tipo_estrella"] === 'Maxiestrella')
                            echo "selected" ?>>
                                Maxiestrella</option>
                            <option value="Estrella oculta" <?php if ($datos["tipo_estrella"] === 'Estrella oculta')
                            echo "selected" ?>>Estrella oculta</option>
                            <option value="Cometa Pícaro" <?php if ($datos["tipo_estrella"] === 'Cometa Pícaro')
                            echo "selected" ?>>Cometa Pícaro</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mision_oculta" class="form-label">Misión oculta</label>
                    <?php echo form_dropdown('mision_oculta', $optionsMisionesOcultas, rellenarDato($errors, $datos, "mision_oculta"), 'class="form-control" id="mision_oculta" '); ?>
                </div>

                <div class="mb-3">
                    <label for="disponibilidad" class="form-label">Disponibilidad</label>
                    <span id="disponibilidad_error" class="text-danger"></span>
                    <textarea class="form-control" name="disponibilidad" id="disponibilidad"
                        placeholder="Disponibilidad"><?= $datos["disponibilidad"]; ?></textarea>
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