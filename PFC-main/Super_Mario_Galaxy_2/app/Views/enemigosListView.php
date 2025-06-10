<?php include("templates/parte1.php"); ?>
<div class="row">
    <div class="col-12">


        <table class="table datatable dt-enemigos" id="tabla">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (count($enemigos) > 0) {
                    foreach ($enemigos as $e) {
                        ?>
                        <tr>
                            <td><?php echo $e["id"]; ?></td>
                            <td><?php echo $e["nombre"]; ?></td>
                            <td><img src="data:image/png;base64,<?php echo base64_encode($e['imagen']); ?>" width="80px"></td>
                            <td><?php echo $e['rol']; ?></td>
                            <td><a href="<?php echo baseUrl(); ?>/misiones/editar?id=<?php echo $e["id"]; ?>"><i
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
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Imagen</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
<?php include("templates/parte2.php"); ?>