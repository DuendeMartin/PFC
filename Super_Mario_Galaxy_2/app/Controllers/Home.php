<?php

namespace App\Controllers;
use App\Models\RoleModel;
use App\Models\UsuarioModel;
class Home extends BaseController
{
    protected $helpers = ['form'];
    public function index()
    {
        return view('portada');
    }
    public function inicio()
    {
        return view('inicio');
    }


    public function comprobar()
    {
        $id = $this->request->getVar('id');
        $usuario = $this->request->getVar('nombre_usuario');
        $password = $this->request->getVar('contrasena');

        echo $id . "_" . $usuario . "-" . $password;
        //return view('formulario');
        return redirect()->to("/inicio");
    }
}
