<?php
namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class EnemigoModel extends Model
{
    protected $table='enemigos';
    protected $allowedFields=['id', 'nombre', 'imagen', 'rol', 'invencible'];
}
?>