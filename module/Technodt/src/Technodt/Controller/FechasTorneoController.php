<?php
namespace Technodt\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class FechasTorneoController
{
    protected $daoFechasTorneo;
    
    public function getDAOFechasTorneo()
     {
        
         if (!$this->daoFechasTorneo) {
             $sm = $this->getServiceLocator();
             $this->daoFechasTorneo = $sm->get('Technodt\Model\DAO\DAOFechasTorneo');
         }
         return $this->daoFechasTorneo;
     }
}