<!-- Vendor js -->


<script src="<?php echo baseUrl(); ?>/templates/assets/js/vendor.min.js"></script>

<script src="<?php echo baseUrl(); ?>/templates/assets/libs/morris-js/morris.min.js"></script>
<script src="<?php echo baseUrl(); ?>/templates/assets/libs/raphael/raphael.min.js"></script>

<script src="<?php echo baseUrl(); ?>/templates/assets/js/pages/dashboard.init.js"></script>

<!-- App js -->
<script src="<?php echo baseUrl(); ?>/templates/assets/js/app.min.js"></script>

<script src="<?php echo baseUrl(); ?>/templates/assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo baseUrl(); ?>/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>



<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.js"></script>
<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.time.js"></script>
<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.resize.js"></script>
<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.pie.js"></script>
<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.selection.js"></script>
<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.stack.js"></script>
<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.orderBars.js"></script>
<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.crosshair.js"></script>
<script src="<?php echo baseUrl(); ?>/assets/libs/flot-charts/jquery.flot.axislabels.js"></script>
<!-- Chart JS -->
<script src="<?php echo baseUrl(); ?>/assets/libs/chart-js/Chart.bundle.min.js"></script>
<!-- Google Charts js -->
<script src="https://www.gstatic.com/charts/loader.js"></script>
<script>
      $(document).ready(function () {
            $(".dt-galaxias").DataTable({
                  initComplete: function () {
                        this.api().columns([1, 4, 5]).every(function () {
                              let column = this;
                              $(column.header()).append('<br><input type="text" placeholder="Buscar" />');
                              $('input', this.header()).on('keyup change clear', function () {
                                    if (column.search() !== this.value) {
                                          column.search(this.value).draw();
                                    }
                              });
                        });
                        this.api().columns([2]).every(function () {
                              let musicaFondo = new Audio();
                              musicaFondo.load();
                              let mundos = [];
                              let musicasMundo = [
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/1/normal.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/2/normal.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/3/normal.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/4/normal.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/5/normal.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/6/normal.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/extra/normal.wav")
                              ];
                              let musicasMundoAlejado = [
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/1/alejado.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/2/alejado.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/3/alejado.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/4/alejado.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/5/alejado.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/6/alejado.wav"),
                                    new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/mundos/extra/alejado.wav")
                              ];
                              let buclesMusicasMundo = [
                                    874496,
                                    874496,
                                    530432,
                                    602112,
                                    516096,
                                    200704,
                                    129024
                              ];
                              let lastSelection = 0;
                              let lastSelectionTime = 0;
                              musicaFondo = musicasMundoAlejado[lastSelection];
                              musicaFondo.volume = 0.3;
                              musicaFondo.currentTime = lastSelectionTime;
                              musicaFondo.addEventListener("ended", function () {
                                    this.currentTime = buclesMusicasMundo[0] / 32000;
                                    this.play();
                              });
                              musicaFondo.play();
                              let column = this;
                              $(column.header()).append('<br>');
                              let select = $('<select><option value="">Todo</option></select>').appendTo($(column.header())).on('change', function () {
                                    let val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    musicaFondo.pause();
                                    lastSelectionTime = musicaFondo.currentTime;
                                    for (let i = 0; i < mundos.length; i++) {
                                          if (val != "" && mundos.indexOf(val) == i && lastSelection == i) {
                                                lastSelection = i;
                                                musicaFondo = musicasMundo[i];
                                                musicaFondo.volume = 0.3;
                                                musicaFondo.currentTime = lastSelectionTime;
                                                musicaFondo.addEventListener("ended", function () {
                                                      this.currentTime = buclesMusicasMundo[i] / 32000;
                                                      this.play();
                                                });
                                                musicaFondo.play();
                                          } else if (val != "" && mundos.indexOf(val) == i) {
                                                lastSelection = i;
                                                musicaFondo = musicasMundo[i];
                                                musicaFondo.volume = 0.3;
                                                musicaFondo.addEventListener("ended", function () {
                                                      this.currentTime = buclesMusicasMundo[i] / 32000;
                                                      this.play();
                                                });
                                                musicaFondo.load();
                                                musicaFondo.play();
                                          } else if (val == "") {
                                                musicaFondo = musicasMundoAlejado[lastSelection];
                                                musicaFondo.volume = 0.3;
                                                musicaFondo.currentTime = lastSelectionTime;
                                                musicaFondo.addEventListener("ended", function () {
                                                      this.currentTime = buclesMusicasMundo[i] / 32000;
                                                      this.play();
                                                });
                                                musicaFondo.play();
                                          }
                                    }
                              });
                              column.data().unique().each(function (d) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                                    mundos.push(d);
                              });
                        });
                  },
                  "language": {
                        "search": "Buscar:",
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "paginate": {
                              "first": "Primero",
                              "last": "Último",
                              "next": "Siguiente",
                              "previous": "Anterior"
                        }
                  },
                  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                  "ordering": false,
                  "dom": "lrtip"
            });
            $(".dt-misiones").DataTable({
                  initComplete: function () {
                        this.api().columns([2, 3, 6]).every(function () {
                              let column = this;
                              $(column.header()).append('<br><input type="text" placeholder="Buscar" />');
                              $('input', this.header()).on('keyup change clear', function () {
                                    if (column.search() !== this.value) {
                                          column.search(this.value).draw();
                                    }
                              });
                        });
                        this.api().columns([4]).every(function () {
                              let musicaFondo = new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/seleccionar_mision.wav");
                              musicaFondo.volume = 0.3;
                              musicaFondo.load();
                              musicaFondo.addEventListener("ended", function () {
                                    this.currentTime = 401408 / 48000;
                                    this.play();
                              });
                              musicaFondo.play();
                              let audioCometaPicaro = new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/cometa_picaro.wav");
                              audioCometaPicaro.volume = 0.6;
                              let column = this;
                              $(column.header()).append('<br>');
                              let select = $('<select><option value="">Todo</option></select>').appendTo($(column.header())).on('change', function () {
                                    let val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                                    if (val == "Cometa Pícaro") {
                                          audioCometaPicaro.load();
                                          audioCometaPicaro.play();
                                    }
                              });
                              column.data().unique().each(function (d) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                              });
                        });
                  },
                  "language": {
                        "search": "Buscar:",
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "paginate": {
                              "first": "Primero",
                              "last": "Último",
                              "next": "Siguiente",
                              "previous": "Anterior"
                        }
                  },
                  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                  "ordering": false,
                  "dom": "lrtip"
            });
            $(".dt-estrellas-verdes").DataTable({
                  "language": {
                        "search": "Buscar:",
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "paginate": {
                              "first": "Primero",
                              "last": "Último",
                              "next": "Siguiente",
                              "previous": "Anterior"
                        }
                  },
                  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                  "ordering": false,
                  "dom": "lrtip"
            });
            $(".dt-enemigos").DataTable({
                  initComplete: function () {
                        let musicaFondo = new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/minijuego.wav");
                        musicaFondo.volume = 0.3;
                        musicaFondo.load();
                        musicaFondo.addEventListener("ended", function () {
                              this.currentTime = 229376 / 32000;
                              this.play();
                        });
                        musicaFondo.play();
                        this.api().columns([1]).every(function () {
                              let column = this;
                              $(column.header()).append('<br><input type="text" placeholder="Buscar" />')
                              $('input', this.header()).on('keyup change clear', function () {
                                    if (column.search() !== this.value) {
                                          column.search(this.value).draw();
                                    }
                              });
                        });
                        this.api().columns([3]).every(function () {
                              let column = this;
                              $(column.header()).append('<br>');
                              let select = $('<select><option value="">Todo</option></select>').appendTo($(column.header())).on('change', function () {
                                    let val = $.fn.dataTable.util.escapeRegex($(this).val());
                                    column.search(val ? '^' + val + '$' : '', true, false).draw();
                              });
                              column.data().unique().each(function (d) {
                                    select.append('<option value="' + d + '">' + d + '</option>');
                              });
                        });
                  },
                  "language": {
                        "search": "Buscar:",
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "paginate": {
                              "first": "Primero",
                              "last": "Último",
                              "next": "Siguiente",
                              "previous": "Anterior"
                        }
                  },
                  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                  "ordering": false,
                  "dom": "lrtip"
            });
            $(".dt-encuentros-enemigos").DataTable({
                  initComplete: function () {
                        let musicaFondo = new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/galaxia_jardines_siderales.wav");
                        musicaFondo.volume = 0.3;
                        musicaFondo.load();
                        musicaFondo.addEventListener("ended", function () {
                              this.currentTime = 544768 / 32000;
                              this.play();
                        });
                        musicaFondo.play();
                  },
                  "language": {
                        "search": "Buscar:",
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se encontraron resultados",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No hay registros disponibles",
                        "infoFiltered": "(filtrado de _MAX_ registros totales)",
                        "paginate": {
                              "first": "Primero",
                              "last": "Último",
                              "next": "Siguiente",
                              "previous": "Anterior"
                        }
                  },
                  "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
                  "ordering": false,
                  "dom": "lrtip"
            });
      });
</script>