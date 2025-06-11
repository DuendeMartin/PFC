<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class MisionModel extends Model
{
    protected $table = 'misiones';
    protected $allowedFields = ['galaxia', 'numero', 'titulo', 'objetivo', 'tipo_estrella', 'mision_oculta', 'disponibilidad'];
    public function listaMisiones()
    {
        $misiones = $this->setTable('misiones m')->join('galaxias g', 'm.galaxia=g.numero')->join('misiones mo', 'm.galaxia=mo.galaxia AND m.mision_oculta=mo.numero', 'left')->select('m.*, g.nombre, mo.titulo AS titulo_mision_oculta')->findAll();
        return $misiones;
    }
}
?>