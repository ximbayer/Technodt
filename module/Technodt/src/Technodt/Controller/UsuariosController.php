<?php

namespace Technodt\Controller;
use Zend\Mvc\Controller\AbstractActionController;

use Zend\View\Model\ViewModel;
use Technodt\Form\Formularios;

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
        $idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsaurios = $this->getDAOUsuarios();
		$usuario = $daoUsaurios ->getUsuario($idPersona);
		$email = $usuario->email;
		return new ViewModel(array('email' => $email));
    }
    
    public function periodistaAction()
    {
		$idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsaurios = $this->getDAOUsuarios();
		$usuario = $daoUsaurios ->getUsuario($idPersona);
		$email = $usuario->email;
		return new ViewModel(array('email' => $email));
    }
    
    public function administradorAction()
    {
        $idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsaurios = $this->getDAOUsuarios();
		$usuario = $daoUsaurios ->getUsuario($idPersona);
		$email = $usuario->email;
		return new ViewModel(array('email' => $email));
    }
}