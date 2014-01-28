<?php

namespace Technodt\Controller;
use Zend\Mvc\Controller\AbstractActionController;

use Zend\View\Model\ViewModel;
use Technodt\Form\Formularios;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

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
        
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $resultApellido = $this->dbAdapter->query("select apellido from persona where documento in ('34729975')", Adapter::QUERY_MODE_EXECUTE);
        $resultNombres = $this->dbAdapter->query("select nombres from persona where documento in ('34729975')", Adapter::QUERY_MODE_EXECUTE);
        $apellidoUsuario = $resultApellido->toArray()['0']['apellido'];
        $nombresUsuario = $resultNombres->toArray()['0']['nombres'];
        $valores = array(
            'nombresUsuario' => $nombresUsuario,
            'apellidoUsuario' => $apellidoUsuario,
            'crearEquipo' => 'Crear Equipo',
            'listarTabla' => 'Listar Tabla General del Torneo'
        );
        
        return new ViewModel($valores);
    }
    
    public function periodistaAction()
    {
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $resultApellido = $this->dbAdapter->query("select apellido from persona where documento in ('15456876')", Adapter::QUERY_MODE_EXECUTE);
        $resultNombres = $this->dbAdapter->query("select nombres from persona where documento in ('15456876')", Adapter::QUERY_MODE_EXECUTE);
        $apellidoUsuario = $resultApellido->toArray()['0']['apellido'];
        $nombresUsuario = $resultNombres->toArray()['0']['nombres'];
        $valores = array(
            'nombresUsuario' => $nombresUsuario,
            'apellidoUsuario' => $apellidoUsuario,
            'gestionarPuntajes' => 'Gestionar Puntajes',
        );
        
        return new ViewModel($valores);
    }
    
    public function administradorAction()
    {
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $resultApellido = $this->dbAdapter->query("select apellido from persona where documento in ('15678567')", Adapter::QUERY_MODE_EXECUTE);
        $resultNombres = $this->dbAdapter->query("select nombres from persona where documento in ('15678567')", Adapter::QUERY_MODE_EXECUTE);
        $apellidoUsuario = $resultApellido->toArray()['0']['apellido'];
        $nombresUsuario = $resultNombres->toArray()['0']['nombres'];
        $valores = array(
            'nombresUsuario' => $nombresUsuario,
            'apellidoUsuario' => $apellidoUsuario,
            'cerrarFecha' => 'Cerrar Fecha',
        );
        
        return new ViewModel($valores);
    }
}