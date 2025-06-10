<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class EstrellaVerdeModel extends Model
{
    protected $table = 'estrellas_verdes';
    protected $allowedFields = ['galaxia', 'numero', 'mision_incluyente', 'ubicacion'];
    public function listaEstrellasVerdes()
    {
        $estrellas_verdes = $this->setTable('estrellas_verdes ev')->join('galaxias g', 'ev.galaxia=g.numero')->join('misiones m', 'ev.galaxia=m.galaxia AND ev.mision_incluyente=m.numero')->select('ev.*, g.nombre, m.titulo')->findAll();
        return $estrellas_verdes;
    }
}
?>