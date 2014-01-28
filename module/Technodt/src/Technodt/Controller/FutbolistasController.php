<?php
namespace Technodt\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class FutbolistasController
{
    protected $daoFutbolistas;
    
    public function getDAOFutbolistas()
     {
        
         if (!$this->daoFutbolistas) {
             $sm = $this->getServiceLocator();
             $this->daoFutbolistas = $sm->get('Technodt\Model\DAO\DAOFutbolistas');
         }
         return $this->daoFutbolistas;
     }
}