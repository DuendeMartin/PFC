<?php include("templates/parte1.php"); ?>
<div class="row">
    <div class="col-12">


        <table class="table datatable dt-galaxias" id="tabla">
            <thead>
                <tr>
                    <th>Número</th>
                    <th>Nombre</th>
                    <th>Mundo</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Criterio para desbloquear</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (count($galaxias) > 0) {
                    foreach ($galaxias as $g) {
                        ?>
                        <tr>
                            <td><?php echo $g["numero"]; ?></td>
                            <td><?php echo $g["nombre"]; ?></td>
                            <td><?php echo $g["mundo"]; ?></td>
                            <td><img src="data:image/png;base64,<?php echo base64_encode($g['imagen']); ?>" width="100px"></td>
                            <td><?php echo $g["descripcion"]; ?></td>
                            <td><?php echo $g["criterio_desbloquear"]; ?></td>
                            <td><a href="<?php echo baseUrl(); ?>/galaxias/editar?numero=<?php echo $g["numero"]; ?>"><i
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
                    <th>Número</th>
                    <th>Nombre</th>
                    <th>Mundo</th>
                    <th>Imagen</th>
                    <th>Descripción</th>
                    <th>Criterio para desbloquear</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
<?php include("templates/parte2.php"); ?>