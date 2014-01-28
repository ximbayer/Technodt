<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Video7\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Video7\Model\Entity\Modelo;
use Video7\Model\Entity\Usuarios;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;


class IndexController extends AbstractActionController
{
    public $dbAdapter;
    
    public function indexAction()
    {
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $u = new Usuarios($this->dbAdapter);
        $valores = array(
            'titulo' => 'Mostrando datos desde TableGateWay',
            'datos'  => $u->fetchAll(),
        );
        
        return new ViewModel($valores);
    }
    
    public function verAction()
    {
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $u = new Usuarios($this->dbAdapter);
        $id= (int) $this->params()->fromRoute('id',0);
        $valores = array(
            'titulo' => 'Detalles del Usuario:',
            'datos'  => $u->getUsuarioById($id),
        );
        
        return new ViewModel($valores);
    }
    
    public function addAction()
    {
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $u = new Usuarios($this->dbAdapter);
        $data = array(
            'nombre'=> 'Sebastian Albino',
            'email' => 'sebito@outlook.com',
        );
        $u->updateUsuarioAction(0,$data['nombre'],$data['email']);
        $valores = array(
            'titulo' => 'Agregar Usuario:',
            'datos'  => $u->fetchAll(),
        );
        
        return new ViewModel($valores);
    }

        public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /module-specific-root/skeleton/foo
        return array();
    }
    
    public function modelAction() 
    {
        $n = new Modelo();
        $t = $n->getTexto();
        return new ViewModel(array('texto'=>$t));
    }
    
    public function resultAction()
    {   
        $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        $result = $this->dbAdapter->query("select * from Usuario order by id_usuario desc", Adapter::QUERY_MODE_EXECUTE);
        $datos = $result->toArray();
        //var_dump($this->dbAdapter);
        return new ViewModel(array('titulo'=>'Conectarse a MySQL utilizando ResultSet','datos'=>$datos));
    }
}
