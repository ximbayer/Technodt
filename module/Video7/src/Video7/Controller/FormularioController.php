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
use Video7\Form\Formularios;
use Video7\Model\Entity\Usuarios;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;


class FormularioController extends AbstractActionController
{
    public function indexAction() 
    {
        
        return new ViewModel();
    }
    
    public function formularioAction()
    {
        
        if ($this->getRequest()->isPost())
        {
            echo 'Se recibió el POST';
            exit();
        } else
        {
            $form = new Formularios("form");
            
            return new ViewModel(array(
                'titulo'=>'Registro de Usuario:',
                'form'=>$form,
                'url'=>$this->getRequest()->getBaseUrl()));
        }
    }
    
    public function registroAction()
    {
        if ($this->getRequest()->isPost())
        {
            $this->dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
            $u = new Usuarios($this->dbAdapter);
            $data = $this->request->getPost();
            $u->addAction($data);
            return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/video7/index/index');
        } else
        {
            $form = new Formularios("form");
            
            return new ViewModel(array(
                'titulo'=>'Registro de Usuario:',
                'form'=>$form,
                'url'=>$this->getRequest()->getBaseUrl()));
        }
    }
    
    public function receiveAction()
    {
        return new ViewModel();
    }
}
