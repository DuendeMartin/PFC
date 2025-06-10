<?php include("templates/parte1.php"); ?>
<div class="row">
    <div class="col-12">


        <table class="table datatable dt-encuentros-enemigos" id="tabla">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Galaxia</th>
                    <th>Mision</th>
                    <th>Enemigo</th>
                    <th>Cantidad</th>
                    <th>Planeta bonus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (count($encuentros_enemigos) > 0) {
                    foreach ($encuentros_enemigos as $ee) {
                        ?>
                        <tr>
                            <td><?php echo $ee["id"]; ?></td>
                            <td name="<?php echo "g" . $ee["numero_galaxia"]; ?>"><?php echo $ee["nombre_galaxia"]; ?></td>
                            <td name="<?php if ($ee["estrella_verde"] == 0) {
                                echo "m" . $ee["numero_mision"];
                            } else {
                                echo "ev" . $ee["numero_estrella_verde"];
                            }
                            ?>"><?php if ($ee["estrella_verde"] == 0) {
                                echo $ee["titulo_mision"];
                            } else {
                                echo "Estrella Verde " . $ee["numero_estrella_verde"];
                            }
                            ?></td>
                            <td id="<?php echo $ee["nombre_enemigo"]; ?>"><?php echo $ee["nombre_enemigo"]; ?></td>
                            <td><?php echo $ee["cantidad"];
                            if ($ee["mas"] == 1) {
                                echo "+";
                            }
                            ?></td>
                            <td><?php echo $ee["planeta_bonus"]; ?></td>
                            <td><a href="<?php echo baseUrl(); ?>/encuentros_enemigos/editar?id=<?php echo $ee["id"]; ?>"><i
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
                    <th>Galaxia</th>
                    <th>Mision</th>
                    <th>Enemigo</th>
                    <th>Cantidad</th>
                    <th>Planeta bonus</th>
                    <th>Acciones</th>
                </tr>
            </tfoot>
        </table>

    </div>
</div>
<?php include("templates/parte2.php"); ?>