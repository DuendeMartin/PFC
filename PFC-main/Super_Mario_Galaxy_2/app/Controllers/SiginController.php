<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\UsuarioModel;


class SiginController extends BaseController
{
    
    protected $helpers=['form'];
    
    public function index()
    {
         return view('loginView'); 
    }
    public function loginAuth()
    {
       
       $rules=[
         'username'=>[
             'rules'=>'required',
             'errors'=>[
                 'required'=>'Debes introducir un nombre de usuario'
             ]
         ],
           
        'password'=>[
             'rules'=>'required',
             'errors'=>[
                 'required'=>'Debes introducir una contraseña'
             ]
         ],
       ]; 
        
      $datos=$this->request->getPost(array_keys($rules));
    
     if(! $this->validateData($datos,$rules)){
         return redirect()->back()->withInput();
     }    
        
        
       $username=$this->request->getvar('username');
       $password=$this->request->getvar('password');
        
        
      $userModel=new UsuarioModel();
      $data=$userModel->select('usuarios.id,usuarios.nombre_usuario,usuarios.contrasena,usuarios.administrador')
          ->where('nombre_usuario',$username)
          ->orderBy('usuarios.id','DESC')->first();
        if($data){
            $pass=$data["contrasena"];
            //$authenticatePassword=password_verify($password,$pass);
            if(md5($password)==$pass)$authenticatePassword=true;else $authenticatePassword=false;
            
            if($authenticatePassword){
                $ses_data=[
                    'id'=>$data['id'],
                    'nombre_usuario'=>$data['nombre_usuario'],
                    'administrador'=>$data['administrador'],
                ];
                $session=session();
                $session->set($ses_data);
                return redirect()->to('/inicio');
            }
        }
    }
    
}
