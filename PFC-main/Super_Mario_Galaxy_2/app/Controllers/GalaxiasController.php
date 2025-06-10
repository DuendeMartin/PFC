<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\GalaxiaModel;


class GalaxiasController extends BaseController
{

    protected $helpers = ['form'];
    public function index()
    {
        $model = new GalaxiaModel();
        $data['galaxias'] = $model->findAll();

        return view('galaxiasListView', $data);
    }

    public function editar()
    {
        $model = new GalaxiaModel();
        $numero = $this->request->getvar('numero');
        $data["datos"] = $model->where('numero', $numero)->first();
        return view('galaxiasEditView', $data);
    }

    public function actualizar()
    {

        $rules = [
            'nombre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir el nombre de la galaxia',
                ]
            ],
            'imagen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes seleccionar la imagen de la galaxia',
                ]
            ],
            'descripcion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir la descripción de la galaxia',
                ]
            ],
            'criterio_desbloquear' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir el criterio para desbloquear la galaxia',
                ]
            ],
        ];

        $datos = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($datos, $rules)) {
            return redirect()->back()->withInput();
        }

        $model = new GalaxiaModel();
        $nombre = $this->request->getvar('nombre');
        $mundo = $this->request->getvar('mundo');
        $imagen = $this->request->getvar('imagen');
        $descripcion = $this->request->getvar('descripcion');
        $criterio_desbloquear = $this->request->getvar('criterio_desbloquear');
        $numero = $this->request->getvar('numero');
        $model->where('numero', $numero)
            ->set(['nombre' => $nombre, 'mundo' => $mundo, 'imagen' => $imagen, 'descripcion' => $descripcion, 'criterio_desbloquear' => $criterio_desbloquear])
            ->update();


        return redirect()->to('/galaxias');
    }
}
