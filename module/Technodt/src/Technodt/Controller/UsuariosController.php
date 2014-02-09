<?php

namespace Technodt\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


class UsuariosController extends AbstractActionController
{
    protected $daoUsuarios;
    
    public function getDAOUsuarios()
     {
        
         if (!$this->daoUsuarios) {
             $sm = $this->getServiceLocator();
             $this->daoUsuarios = $sm->get('Technodt\Model\DAO\DAOUsuarios');
         }
         return $this->daoUsuarios;
     }
     
	public function participanteAction()
	{
        //estaba antes para mostrar el email
        /*$idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsaurios = $this->getDAOUsuarios();
		$usuario = $daoUsuarios ->getUsuario($idPersona);
		$email = $usuario->email;
		return new ViewModel(array('email' => $email));*/
        
        //para mostrar el/los nombres
        $idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsuarios = $this->getDAOUsuarios();
		$persona = $daoUsuarios->getNombreUsuario($idPersona);
		$nombre = $persona->nombres;
        $apellido = $persona->apellido;
		return new ViewModel(array('nombres' => $nombre, "apellido" => $apellido, 'id_persona' => $idPersona));
	}


    
    public function periodistaAction()
    {
		$idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsuarios = $this->getDAOUsuarios();
		$persona = $daoUsuarios->getNombreUsuario($idPersona);
		$nombre = $persona->nombres;
        $apellido = $persona->apellido;
		return new ViewModel(array('nombres' => $nombre, "apellido" => $apellido,'id_persona' => $idPersona));
    }
    
    public function administradorAction()
    {
        $idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsuarios = $this->getDAOUsuarios();
		$persona = $daoUsuarios->getNombreUsuario($idPersona);
		$nombre = $persona->nombres;
        $apellido = $persona->apellido;
		return new ViewModel(array('nombres' => $nombre, "apellido" => $apellido, 'id_persona' => $idPersona));
    }
}