<?php
namespace Technodt\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class UsuariosController extends AbstractActionController
{
    protected $daoUsuarios;
    protected $daoEquiposFantasia;
	
    public function getDAOUsuarios()
     {
        
         if (!$this->daoUsuarios) {
             $sm = $this->getServiceLocator();
             $this->daoUsuarios = $sm->get('Technodt\Model\DAO\DAOUsuarios');
         }
         return $this->daoUsuarios;
	}

	public function getDAOEquiposFantasia()
     {
        
         if (!$this->daoEquiposFantasia) {
             $sm = $this->getServiceLocator();
             $this->daoEquiposFantasia = $sm->get('Technodt\Model\DAO\DAOEquiposFantasia');
         }
         return $this->daoEquiposFantasia;
     }
     
    public function equipoAction()
    {
        $idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsaurios = $this->getDAOUsuarios();
		$usuario = $daoUsaurios ->getUsuario($idPersona);
		$email = $usuario->email;
		
		$form = new EquipoFantasiaForm();
        $form->get('submit')->setValue('Guardar');
		
		return new ViewModel(array('email' => $email));
    }
    
    
}

    