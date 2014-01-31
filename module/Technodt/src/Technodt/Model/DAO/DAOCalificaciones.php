<?php
namespace Technodt\Model\DAO;

 use Zend\Db\TableGateway\TableGateway; 

 class DAOCalificaciones
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

     public function getCalificacion($id)
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
         'fecha_torneo_id_fecha_torneo' => $this->fechaTorneoIdFechaTorneo,
         'futbolista_id_futbolista'     => $this->futbolistaIdFutbolista,
         'goles_convertidos'            => $this->golesConvertidos,
         'figura'                       => $this->figura,
         'calificacion_periodista'      => $this->calificacionPeriodista,
         'amarillas'                    => $this->amarillas,
         'rojas'                        => $this->rojas,
         'penales_convertidos'          => $this->penalesConvertidos,
         'penales_errados'              => $this->penalesErrados,
         'goles_en_contra'              => $this->golesEnContra,
         'minimo_jugado'                => $this->minimoJugado,
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