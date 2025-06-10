<?php include("templates/parte1.php"); ?>
<div class="row">
    <div class="col-12">


        <table class="table datatable dt-misiones" id="tabla">
            <thead>
                <tr>
                    <th>Galaxia</th>
                    <th>Número</th>
                    <th>Título</th>
                    <th>Objetivo</th>
                    <th>Tipo de estrella</th>
                    <th>Misión oculta</th>
                    <th>Disponibilidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (count($misiones) > 0) {
                    foreach ($misiones as $m) {
                        ?>
                        <tr>
                            <td><?php echo $m["nombre"]; ?></td>
                            <td><?php echo $m["numero"]; ?></td>
                            <td><?php echo $m["titulo"]; ?></td>
                            <td><?php echo $m['objetivo']; ?></td>
                            <td><?php echo $m["tipo_estrella"]; ?></td>
                            <td><?php echo $m["titulo_mision_oculta"]; ?></td>
                            <td><?php echo $m["disponibilidad"]; ?></td>
                            <td><a href="<?php echo baseUrl(); ?>/misiones/editar?galaxia=<?php echo $m["galaxia"]; ?>&numero=<?php echo $m["numero"]; ?>"><i
                                        class="fa-solid fa-pen-to-square fa-2 x text-primary"></i></a>

                            </td>
                        </tr>
                        <?php


                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Galaxia</th>
                    <th>Número</th>
                    <th>Título</th>
                    <th>Objetivo</th>
                    <th>Tipo de estrella</th>
                    <th>Misión oculta</th>
                    <th>Disponibilidad</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>

        <h1>Estrellas verdes</h1>

        <table class="table datatable dt-estrellas-verdes" id="tabla">
            <thead>
                <tr>
                    <th>Galaxia</th>
                    <th>Número</th>
                    <th>Misión incluyente</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (count($estrellas_verdes) > 0) {
                    foreach ($estrellas_verdes as $ev) {
                        ?>
                        <tr>
                            <td><?php echo $ev["nombre"]; ?></td>
                            <td><?php echo $ev["numero"]; ?></td>
                            <td><?php echo $ev["titulo"]; ?></td>
                            <td><?php echo $ev["ubicacion"]; ?></td>
                            <td><a href="<?php echo baseUrl(); ?>/estrellas_verdes/editar?galaxia=<?php echo $ev["galaxia"]; ?>&numero=<?php echo $ev["numero"]; ?>"><i
                                        class="fa-solid fa-pen-to-square fa-2 x text-primary"></i></a>

                            </td>
                        </tr>
                        <?php


                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Galaxia</th>
                    <th>Número</th>
                    <th>Misión incluyente</th>
                    <th>Ubicación</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
<?php include("templates/parte2.php"); ?>