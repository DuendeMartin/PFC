<?php include("templates/parte1.php"); ?>
<div class="row">
    <div class="col-12">
        <h1>Super Mario Galaxy 2</h1>
        <p>En esta página encontrarás información útil para este juego de Super Mario, incluyendo galaxias, misiones,
            enemigos y más</p>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let musicaFondo = new Audio("<?php echo baseUrl(); ?>/templates/assets/audio/inicio.wav");
            musicaFondo.volume = 0.3;
            musicaFondo.load();
            musicaFondo.addEventListener("ended", function () {
                this.currentTime = 745472 / 32000;
                this.play();
            });
            musicaFondo.play();
        });
    </script>
    <?php include("templates/parte2.php"); ?>