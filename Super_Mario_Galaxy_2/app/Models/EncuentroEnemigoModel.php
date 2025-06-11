<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class EncuentroEnemigoModel extends Model
{
    protected $table = 'encuentros_enemigos';
    protected $allowedFields = ['id', 'galaxia', 'mision', 'id_enemigo', 'cantidad', 'mas', 'estrella_verde', 'planeta_bonus'];
    public function listaEncuentrosEnemigos()
    {
        $encuentros_enemigos = $this->setTable('encuentros_enemigos ee')->join('galaxias g', 'ee.galaxia=g.numero')->join('misiones m', 'ee.galaxia=m.galaxia AND ee.mision=m.numero')->join('estrellas_verdes ev', 'ee.galaxia=ev.galaxia AND ee.mision=ev.numero')->join('enemigos e', 'ee.id_enemigo=e.id')->select('ee.*, g.numero AS numero_galaxia, g.nombre AS nombre_galaxia, m.numero AS numero_mision, m.titulo AS titulo_mision, ev.numero AS numero_estrella_verde, e.nombre AS nombre_enemigo')->findAll();
        return $encuentros_enemigos;
    }
}
?>