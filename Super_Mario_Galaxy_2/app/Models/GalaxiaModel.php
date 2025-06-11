<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class GalaxiaModel extends Model
{
    protected $table='galaxias';
    protected $allowedFields=['numero', 'nombre', 'mundo', 'imagen', 'descripcion', 'criterio_desbloquear'];
}
?>