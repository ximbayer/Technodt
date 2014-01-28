<?php

namespace Technodt\Model\DAO;

 use Zend\Db\TableGateway\TableGateway;

 class DAOFutbolistas
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

     public function getFutbolista($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id_futbolista' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }

     public function saveAlbum(Futbolista $futbolista)
     {
         $data = array(
             'id_futbolista'        => $futbolista->idFutbolista,
             'nombres'              => $futbolista->nombres,
             'apellido'             => $futbolista->apellido,
             'nro_camiseta'         => $futbolista->nroCamiseta,
             'cotizacion'           => $futbolista->cotizacion,
             'posicion_id_posicion' => $futbolista->posicionIdPosicion,
             'club_id_club'         => $futbolista->clubIdClub,
             
         );

         $id = (int) $futbolista->idFutbolista;
         if ($id == 0) {
             $this->tableGateway->insert($data);
         } else {
             if ($this->getFutbolista($id)) {
                 $this->tableGateway->update($data, array('id_futbolista' => $id));
             } else {
                 throw new \Exception('Futbolista id does not exist');
             }
         }
     }

     public function deleteFutbolista($id)
     {
         $this->tableGateway->delete(array('id_futbolista' => (int) $id));
     }
 }