<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class TrabajoController extends AbstractActionController
{
    public function indexAction()
    {
        $saludo = 'Hola mundo, desde mi controlador Trabajo, el m&aacute;s odiado!!';
        //return new ViewModel(array('saludo'=> $saludo, 'segundo'=>'Cualquier cosa.'));
        $view = new ViewModel();
        $this->layout("layout/trabajo");
        return $view;
    }
    public function valoresAction()
    {
        $id = $this->params()->fromRoute('id',null);
        $id2 = $this->params()->fromRoute('id2',null);
        return new ViewModel(array('id'=> $id, 'id2'=>$id2));
    }
    public function ajaxAction()
    {
        return new ViewModel(array('hola'=>'Hola desde Ajax'));
    }
    
}
