<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonModule for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Technodt;

 use Technodt\Model\DAO\DAOCalificaciones;
 use Technodt\Model\DAO\DAOEquiposFantasia;
 use Technodt\Model\DAO\DAOFechasTorneo;
 use Technodt\Model\DAO\DAOFutbolistas;
 use Technodt\Model\DAO\DAOLogs;
 use Technodt\Model\DAO\DAOUsuarios;
 use Technodt\Model\Entity\Calificacion;
 use Technodt\Model\Entity\EquipoFantasia;
 use Technodt\Model\Entity\FechaTorneo;
 use Technodt\Model\Entity\Futbolista;
 use Technodt\Model\Entity\Usuario;
 use Technodt\Model\Entity\Log;
 
 use Zend\Db\ResultSet\ResultSet;
 use Zend\Db\TableGateway\TableGateway;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
		    // if we're in a namespace deeper than one level we need to fix the \ in the path
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
     
     public function getServiceConfig()
     {
         return array(
             'factories' => array(
				'Technodt\Model\DAO\DAOCalificaciones' =>  function($sm) {
                     $tableGateway = $sm->get('CalificacionesTableGateway');
                     $table = new DAOCalificaciones($tableGateway);
                     return $table;
                 },
                 'CalificacionesTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Calificacion());
                     return new TableGateway('calificacion', $dbAdapter, null, $resultSetPrototype);
                 },
				 'Technodt\Model\DAO\DAOEquiposFantasia' =>  function($sm) {
                     $tableGateway = $sm->get('EquiposFantasiaTableGateway');
                     $table = new DAOEquiposFantasia($tableGateway);
                     return $table;
                 },
                 'EquiposFantasiaTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new EquipoFantasia());
                     return new TableGateway('equipo_fantasia', $dbAdapter, null, $resultSetPrototype);
                 },
				 'Technodt\Model\DAO\DAOFechasTorneo' =>  function($sm) {
                     $tableGateway = $sm->get('FechasTorneoTableGateway');
                     $table = new DAOFechasTorneo($tableGateway);
                     return $table;
                 },
                 'FechasTorneoTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new FechaTorneo());
                     return new TableGateway('fecha_torneo', $dbAdapter, null, $resultSetPrototype);
                 },
				 'Technodt\Model\DAO\DAOFutbolistas' =>  function($sm) {
                     $tableGateway = $sm->get('FutbolistasTableGateway');
                     $table = new DAOFutbolistas($tableGateway);
                     return $table;
                 },
                 'FutbolistasTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new FechaTorneo());
                     return new TableGateway('futbolista', $dbAdapter, null, $resultSetPrototype);
                 },
                 'Technodt\Model\DAO\DAOLogs' =>  function($sm) {
                     $tableGateway = $sm->get('LogsTableGateway');
                     $table = new DAOLogs($tableGateway);
                     return $table;
                 },
                 'LogsTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Log());
                     return new TableGateway('log', $dbAdapter, null, $resultSetPrototype);
                 },
				'Technodt\Model\DAO\DAOUsuarios' =>  function($sm) {
                     $tableGateway = $sm->get('UsuariosTableGateway');
                     $table = new DAOUsuarios($tableGateway);
                     return $table;
                 },
                 'UsuariosTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Usuario());
                     return new TableGateway('usuario', $dbAdapter, null, $resultSetPrototype);
                 }, 
             ),
         );
     }

    /*public function onBootstrap(MvcEvent $e)
    {
        // You may not need to do this if you're doing it elsewhere in your
        // application
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    } */ 
}
