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
             $this->daoUsuarios = $sm->get('Technodt\Model\DAO\DAOUsuarios');
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
			$daoLogs = $this->getDAOLogs();
			$daoUsaurios = $this->getDAOUsuarios();
            $form->setInputFilter($log->getInputFilter());
            $form->setData($request->getPost());
            $documento = $request->getPost('documento');
			$usuario = $daoUsaurios ->getUsuarioByDocumento($documento);
            if ($form->isValid()){
				$tipoDocumento = $request->getPost('tipo_documento');
				$password = $request->getPost('password');
				$tipoUsuario =$usuario->tipoUsuarioIdTipoUsuario;
				
				if( ($usuario->personaDocumento ==$documento) && 
					($usuario->personaTipoDocumentoIdTipoDocumento == $tipoDocumento) &&
					($usuario->password == $password))
					{
					$log->fecha = date("d/m/y");
					$log->hora	= date("H:i:s");
					$log->tipoLogIdTipoLog = 1;
					$log->usuarioPersonaIdPersona = $usuario->personaIdPersona;
					$log->usuarioPersonaDocumento = $usuario->personaDocumento;
					$log->usuarioPersonaTipoDocumentoIdTipoDocumento = $usuario->personaTipoDocumentoIdTipoDocumento;
					$log->usuarioTipoUsuarioIdTipoUsuario = $usuario->tipoUsuarioIdTipoUsuario;
					//insertar el log en la bd:
					$daoLogs->saveLog($log);
					switch($tipoUsuario){
                    case 1:
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/technodt/usuarios/participante/'.$usuario->personaIdPersona);
						break;
                    case 2:
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/technodt/usuarios/periodista/'.$usuario->personaIdPersona); 
                        break;
                    case 3:
                        return $this->redirect()->toUrl($this->getRequest()->getBaseUrl().'/technodt/usuarios/administrador/'.$usuario->personaIdPersona); 
                        break;
					}
					
				}
				else {
						echo "<h5 style='color:#fff; background-color:red;'>El tipo de Usuario o Documento o Contrase&ntilde;a NO son correctas. Intente nuevamente.</h5>";
				}
			}
        } 
		return new ViewModel(array('form' => $form));
	}

        public function fooAction()
    {
        // This shows the :controller and :action parameters in default route
        // are working when you browse to /module-specific-root/skeleton/foo
        return array();
    }
    
}
