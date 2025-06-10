<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\EnemigoModel;


class EnemigosController extends BaseController
{

    protected $helpers = ['form'];
    public function index()
    {
        $model = new EnemigoModel();
        $data['enemigos'] = $model->findAll();

        return view('enemigosListView', $data);
    }

    public function editar()
    {
        $model = new EnemigoModel();
        $id = $this->request->getvar('id');
        $data["datos"] = $model->where('id', $id)->first();
        return view('enemigosEditView', $data);
    }

    public function actualizar()
    {

        $rules = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir el nombre del enemigo',
                ]
            ],
            'imagen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes seleccionar la imagen del enemigo',
                ]
            ],
        ];

        $datos = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($datos, $rules)) {
            return redirect()->back()->withInput();
        }

        $model = new EnemigoModel();
        $nombre = $this->request->getvar('nombre');
        $imagen = $this->request->getvar('imagen');
        $rol = $this->request->getvar('rol');
        $invencible = $this->request->getvar('invencible');
        $id = $this->request->getvar('id');
        $model->where('id', $id)
            ->set(['nombre' => $nombre, 'imagen' => $imagen, 'rol' => $rol, 'invencible' => $invencible])
            ->update();


        return redirect()->to('/enemigos');
    }
}
