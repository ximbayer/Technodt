<?php

namespace Technodt\Model\DAO;

 use Zend\Db\TableGateway\TableGateway;
 use Zend\Db\TableGateway\AbstractTableGateway;
 use Zend\Db\TableGateway\Feature; 
 use Zend\Db\Sql\Sql;
 use Zend\Db\Select;
 use Zend\Db\Adapter\Adapter;

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

	public function fetchFiltrado($idClub, $idPosicion,$cotizacionDesde,$cotizacionHasta)
     {
         $resultSet = $this->tableGateway->select(array('club_id_club' =>$idClub, 'posicion_id_posicion'=>$idPosicion))->where('cotizacion >= $cotizacionDesde','cotizacion <= $cotizacionHasta');
         return $resultSet;
	}
	public function fetchAllClubs()
     {
		$adapter=$this->tableGateway->getAdapter();
        $tableClubs= new TableGateway('club', $adapter, new Feature\RowGatewayFeature('id_club'));
        $results = $tableClubs->select();
        
        return $results;
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

	public function getClubFutbolista($idClub) 
	{
        $adapter=$this->tableGateway->getAdapter();
        $tableClub = new TableGateway('club', $adapter, new Feature\RowGatewayFeature('id_club'));
        $results = $tableClub->select(array('id_club' => $idClub));
        $club = $results->current();
        return $club;
	}

	public function getPosicionFutbolista($idPosicion) 
	{
        $adapter=$this->tableGateway->getAdapter();
        $tablePosicion = new TableGateway('posicion', $adapter, new Feature\RowGatewayFeature('id_posicion'));
        $results = $tablePosicion->select(array('id_posicion' => $idPosicion));
        $posicion = $results->current();
        return $posicion;
	}

     public function saveFutbolista(Futbolista $futbolista)
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