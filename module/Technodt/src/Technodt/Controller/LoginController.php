<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */
namespace Technodt\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Technodt\Model\Entity\Log;
use Technodt\Form\LogForm;

class LoginController extends AbstractActionController
{

    protected $daoLogs;
    protected $daoUsuarios;
    
    public function getDAOLogs()
     {
        
         if (!$this->daoLogs) {
             $sm = $this->getServiceLocator();
             $this->daoLogs = $sm->get('Technodt\Model\DAO\DAOLogs');
         }
         return $this->daoLogs;
     }
     
     public function getDAOUsuarios()
     {
        
         if (!$this->daoUsuarios) {
             $sm = $this->getServiceLocator();
             $this->daoUsuarios = $sm->get('Technodt\Model\DAOUsuarios');
         }
         return $this->daoUsuarios;
     }
    
    public function loginAction()
    {   
        $form = new LogForm();
        $form->get('submit')->setValue('Ingresar');
        
        $request = $this->getRequest();
        
        if ($request->isPost())
        {
            $log = new Log();
            $form->setInputFilter($log->getInputFilter());
            $form->setData($request->getPost());
            
            if ($form->isValid()){
                $this->getDAOLogs();
                //$usuario = $this->getDAOUsuarios()->getUsuarioByDocumento($request->getPost('documento'));
                echo "hola";
                //$tipoUsuario = $usuario['tipo_usuario_id_tipo_usuario'];
                switch($tipoUsuario){
                    case 1:
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/technodt/usuarios/participante');
                        break;
                    case 2:
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/technodt/usuarios/periodista');
                        break;
                    case 3:
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/technodt/usuarios/administrador');
                        break;
                }
            }
            
            
        } 
        return array('form' => $form);
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
