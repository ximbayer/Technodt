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
use Technodt\Form\Formularios;

use Zend\Db\ResultSet\ResultSet;
use Zend\Db\Adapter\Adapter;

class IndexController extends AbstractActionController
{      
 
    public function indexAction()
    {
        $valores = array(
            'titulo' => 'Bienvenidos a TechnoDT.com',
            'subtitulo' => '¿Ya tienes una cuenta?',
            'login'  => 'Ingresar'
        );
        
        return new ViewModel($valores);
        
    }

    public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /module-specific-root/skeleton/foo
        return array();
    }
    
    
}
