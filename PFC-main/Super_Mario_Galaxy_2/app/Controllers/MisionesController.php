<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\MisionModel;
use App\Models\EstrellaVerdeModel;


class MisionesController extends BaseController
{

    protected $helpers=['form','comprobar'];
    public function index()
    {
        $model = new MisionModel();
        $data['misiones'] = $model->listaMisiones();
        $model2 = new EstrellaVerdeModel();
        $data['estrellas_verdes'] = $model2->listaEstrellasVerdes();

        return view('misionesListView', $data);
    }

    public function editar()
    {
        $model = new MisionModel();
        $galaxia = $this->request->getvar('galaxia');
        $numero = $this->request->getvar('numero');
        $data["datos"] = $model->where('galaxia', $galaxia)->where('numero', $numero)->first();


        $options = array();
        $options['']="";

        $modelMisionOculta = new MisionModel();
        $misiones = $modelMisionOculta->where('galaxia', $galaxia)->where('tipo_estrella', 'Estrella oculta')->findAll();
        foreach ($misiones as $mision) {
            $options[$mision["numero"]] = $mision["titulo"];
        }
        $data["optionsMisionesOcultas"] = $options;
        return view('misionesEditView', $data);
    }

    public function actualizar()
    {

        $rules = [
            'titulo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir el título de la misión',
                ]
            ],
            'objetivo' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir el objetivo de la misión',
                ]
            ],
            'tipo_estrella' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes seleccionar el tipo de estrella de la misión',
                ]
            ],
            'disponibilidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir la disponibilidad de la misión',
                ]
            ],
        ];

        $datos = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($datos, $rules)) {
            return redirect()->back()->withInput();
        }

        $model = new MisionModel();
        $galaxia = $this->request->getvar('galaxia');
        $numero = $this->request->getvar('numero');
        $titulo = $this->request->getvar('titulo');
        $objetivo = $this->request->getvar('objetivo');
        $tipo_estrella = $this->request->getvar('tipo_estrella');
        $mision_oculta = $this->request->getvar('mision_oculta');
        $disponibilidad = $this->request->getvar('disponibilidad');
        $model->where('galaxia', $galaxia)
            ->where('numero', $numero)
            ->set(['titulo' => $titulo, 'objetivo' => $objetivo, 'tipo_estrella' => $tipo_estrella, 'mision_oculta' => $mision_oculta, 'disponibilidad' => $disponibilidad])
            ->update();


        return redirect()->to('/misiones');
    }

    public function editar_estrella_verde()
    {
        $model = new EstrellaVerdeModel();
        $galaxia = $this->request->getvar('galaxia');
        $numero = $this->request->getvar('numero');
        $data["datos"] = $model->where('galaxia', $galaxia)->where('numero', $numero)->first();


        $options = array();

        $modelMision = new MisionModel();
        $misiones = $modelMision->where('galaxia', $galaxia)->findAll();
        foreach ($misiones as $mision) {
            $options[$mision["numero"]] = $mision["titulo"];
        }
        $data["optionsMisiones"] = $options;
        return view('estrellas_verdesEditView', $data);
    }

    public function actualizar_estrella_verde()
    {

        $rules = [
            'mision_incluyente' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes seleccionar la misión incluyente de la estrella verde',
                ]
            ],
            'ubicacion' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir la ubicación de la estrella verde',
                ]
            ],
        ];

        $datos = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($datos, $rules)) {
            return redirect()->back()->withInput();
        }

        $model = new MisionModel();
        $galaxia = $this->request->getvar('galaxia');
        $numero = $this->request->getvar('numero');
        $mision_incluyente = $this->request->getvar('mision_incluyente');
        $ubicacion = $this->request->getvar('ubicacion');
        $model->where('galaxia', $galaxia)
            ->where('numero', $numero)
            ->set(['mision_incluyente' => $mision_incluyente, 'ubicacion' => $ubicacion])
            ->update();


        return redirect()->to('/misiones');
    }
}
