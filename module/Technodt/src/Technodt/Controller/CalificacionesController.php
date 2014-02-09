<?php
namespace Technodt\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Technodt\Form\CalificacionfechaForm;
use Technodt\Form\CalificacionjugadoresForm;
use Technodt\Model\Entity\Calificacion;

class CalificacionesController extends AbstractActionController
{
    protected $daoUsuarios;
    protected $daoCalificaciones;
	protected $daoLogs;
	protected $daoFutbolistas;
    protected $daoFechasTorneo;
    protected $listaPartidos;
	
    public function getDAOUsuarios()
     {
        
         if (!$this->daoUsuarios) {
             $sm = $this->getServiceLocator();
             $this->daoUsuarios = $sm->get('Technodt\Model\DAO\DAOUsuarios');
         }
         return $this->daoUsuarios;
	}
    public function getDAOLogs()
     {
        
         if (!$this->daoLogs) {
             $sm = $this->getServiceLocator();
             $this->daoLogs = $sm->get('Technodt\Model\DAO\DAOLogs');
         }
         return $this->daoLogs;
	}
    public function getDAOFutbolistas()
     {
         if (!$this->daoFutbolistas) {
             $sm = $this->getServiceLocator();
             $this->daoFutbolistas = $sm->get('Technodt\Model\DAO\DAOFutbolistas');
         }
         return $this->daoFutbolistas;
	}
    public function getDAOFechasTorneo()
     {
        
         if (!$this->daoFechasTorneo) {
             $sm = $this->getServiceLocator();
             $this->daoFechasTorneo = $sm->get('Technodt\Model\DAO\DAOFechasTorneo');
         }
         return $this->daoFechasTorneo;
     }
	public function getDAOCalificaciones()
     {
        
         if (!$this->$daoCalificaciones) {
             $sm = $this->getServiceLocator();
             $this->$daoCalificaciones = $sm->get('Technodt\Model\DAO\DAOCalificaciones');
         }
         return $this->$daoCalificaciones;
	}
 
    public function gestionarfechaAction()
    {
  		$form = new CalificacionfechaForm();
        
		$idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsuarios = $this->getDAOUsuarios();
		$persona = $daoUsuarios->getNombreUsuario($idPersona);
		$nombre = $persona->nombres;
        $apellido = $persona->apellido;
        $daoFechasTorneo = $this->getDAOFechasTorneo();
        /*$daoFutbolistas = $this->getDAOFutbolistas();
        $daoCalificaciones = $this->getDAOCalificaciones();*/
        
        $fechasTorneo = $daoFechasTorneo->fetchAll(); //obtengo todas las fechas del torneo
        //obtener fixture
        //$daoFechasTorneo = $this->getDAOFechasTorneo();
        
        /*$futbolistas = $daoFutbolistas->fetchAll();
        $calificaciones = $daoCalificaciones->fetchAll();*/
        
        return new ViewModel(array('nombres' => $nombre, 'apellido' => $apellido, 'id_persona' => $idPersona,
                                    'fechastorneo' => $this->getDAOFechasTorneo()->fetchAll(), 'form' => $form));                            
                                    
        
    }
    
    public function obtenerequiposAction()
    {
        $form = new CalificacionfechaForm();
        $id = (int) $this->params()->fromRoute('id_fecha', 1);
		$idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsuarios = $this->getDAOUsuarios();
		$persona = $daoUsuarios->getNombreUsuario($idPersona);
		$nombre = $persona->nombres;
        $apellido = $persona->apellido;
        if (!$id) {
            return $this->redirect()->toRoute('technodt', array('controller' => 'calificaciones',
                'action' => 'obtenerequipos'
            ));
        }
        try {
            $listaPartidos = $this->getDAOFechasTorneo()->getPartidosxFecha($id);
        }
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('calificaciones', array('controller' => 'calificaciones',
                'action' => 'gestionarfecha'
            ));
        }
        //$listaPartidos = $this->getDAOFechasTorneo()->getPartidosxFecha($id);
        
        return new ViewModel(array('id' => $id, 'form' => $form, 'nombres' => $nombre, 'apellido' => $apellido, 
                                    'id_persona' => $idPersona,
                                    'fechastorneo' => $this->getDAOFechasTorneo()->fetchAll(), 
                                    'listapartidos' => $this->getDAOFechasTorneo()->getPartidosxFecha($id)));
                                    
     }
     
     public function puntajesxequipoAction()
     {
        $form = new CalificacionjugadoresForm();
        
        $id = (int) $this->params()->fromRoute('id_fecha', 1);
		$idPersona = (int) $this->params()->fromRoute('id', 0);
        $daoUsuarios = $this->getDAOUsuarios();
		$persona = $daoUsuarios->getNombreUsuario($idPersona);
		$nombre = $persona->nombres;
        $apellido = $persona->apellido;
        
        
        return new ViewModel(array('id' => $id, 'form' => $form, 'nombres' => $nombre, 'apellido' => $apellido, 
                                    'id_persona' => $idPersona));
        
     }      
}