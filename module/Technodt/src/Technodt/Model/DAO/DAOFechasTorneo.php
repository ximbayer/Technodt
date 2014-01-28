<?php
namespace Album\Model\DAO;

 use Zend\Db\TableGateway\TableGateway; 

 class DAOUsuarios
 {
     protected $tableGateway;

     public function __construct(TableGateway $tableGateway)
     {
         $this->tableGateway = $tableGateway;
     }

     public function fetchAll()
     {
         $resultSet = $this->tableGateway->select();
         return $resultSet;
     }

     public function getUsuario($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id_fecha_torneo' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveFechaTorneo(FechaTorneo $fechaTorneo)
     {
         $data = array(
         'id_fecha_torneo' => $this->idFechaTorneo,
         'fecha_cerrada' => $this->fechaCerrada,
         'orden_fecha' => $this->ordenFecha,
         'veda_desde' => $this->vedaDesde,
         'veda_hasta' => $this->vedaHasta,
         );

         $id = (int) $log->idFechaTorneo;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getFechaTorneo($id)) {
                 $this->tableGateway->update($data, array('id_fecha_torneo' => $id));
             } else {
                 throw new \Exception('FechaTorneo id does not exist');
             }
         }
     }

     public function deleteFehaTorneo($id)
     {
         $this->tableGateway->delete(array('id_fecha_torneo' => (int) $id));
     }
 }