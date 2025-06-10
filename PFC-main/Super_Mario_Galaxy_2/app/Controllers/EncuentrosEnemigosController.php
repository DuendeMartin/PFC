<?php

namespace App\Controllers;
use App\Models\EnemigoModel;
use App\Models\EstrellaVerdeModel;
use App\Models\GalaxiaModel;
use App\Models\MisionModel;
use CodeIgniter\Controller;
use App\Models\EncuentroEnemigoModel;


class EncuentrosEnemigosController extends BaseController
{

    protected $helpers = ['form', 'comprobar'];
    public function index()
    {
        $model = new EncuentroEnemigoModel();
        $data['encuentros_enemigos'] = $model->listaEncuentrosEnemigos();

        return view('encuentros_enemigosListView', $data);
    }

    public function editar()
    {
        $model = new EncuentroEnemigoModel();
        $id = $this->request->getvar('id');
        $data["datos"] = $model->where('id', $id)->first();


        $options = array();
        $options2 = array();
        $options3 = array();
        $options4 = array();

        $modelGalaxia = new GalaxiaModel();
        $galaxias = $modelGalaxia->findAll();
        foreach ($galaxias as $galaxia) {
            $options[$galaxia["numero"]] = $galaxia["nombre"];
            $modelMision = new MisionModel();
            $misiones = $modelMision->where('galaxia', $galaxia["numero"])->findAll();
            foreach ($misiones as $mision) {
                $options2[$mision["numero"]] = $mision["titulo"];
            }
            $modelEstrellaVerde = new EstrellaVerdeModel();
            $estrellas_verdes = $modelEstrellaVerde->where('galaxia', $galaxia["numero"])->findAll();
            foreach ($estrellas_verdes as $estrella_verde) {
                $options3[$estrella_verde["numero"]] = "Estrella Verde " . $estrella_verde["numero"];
            }
        }
        $modelEnemigo = new EnemigoModel();
        $enemigos = $modelEnemigo->findAll();
        foreach ($enemigos as $enemigo) {
            $options4[$enemigo["id"]] = $enemigo["nombre"];
        }

        $data["optionsGalaxias"] = $options;
        $data["optionsMisiones"] = $options2;
        $data["optionsEstrellasVerdes"] = $options3;
        $data["optionsEnemigos"] = $options4;
        return view('encuentros_enemigosEditView', $data);
    }

    public function actualizar()
    {

        $rules = [
            'cantidad' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir la cantidad del enemigo',
                ]
            ],
            'planeta_bonus' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Debes introducir la cantidad del enemigo en el planeta bonus',
                ]
            ],
        ];

        $datos = $this->request->getPost(array_keys($rules));

        if (!$this->validateData($datos, $rules)) {
            return redirect()->back()->withInput();
        }

        $model = new EncuentroEnemigoModel();
        $galaxia = $this->request->getvar('galaxia');
        $mision = $this->request->getvar('mision');
        $id_enemigo = $this->request->getvar('id_enemigo');
        $cantidad = $this->request->getvar('cantidad');
        $mas = $this->request->getvar('mas');
        $estrella_verde = $this->request->getvar('estrella_verde');
        $planeta_bonus = $this->request->getvar('planeta_bonus');
        $id = $this->request->getvar('id');
        $model->where('id', $id)
            ->set(['galaxia' => $galaxia, 'mision' => $mision, 'id_enemigo' => $id_enemigo, 'cantidad' => $cantidad, 'mas' => $mas, 'estrella_verde' => $estrella_verde, 'planeta_bonus' => $planeta_bonus])
            ->update();


        return redirect()->to('/enemigos');
    }
}
