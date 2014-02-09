<?php
namespace Technodt\Model\DAO;

 use Zend\Db\TableGateway\TableGateway; 
 use Zend\Db\TableGateway\AbstractTableGateway;
 use Zend\Db\TableGateway\Feature; 
 use Zend\Db\Sql\Sql;
 use Zend\Db\Adapter\Adapter;

 class DAOFechasTorneo
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

     public function getFechasTorneo($id)
     {
         $id  = (int) $id;
         $rowset = $this->tableGateway->select(array('id_fecha_torneo' => $id));
         $row = $rowset->current();
         if (!$row) {
             throw new \Exception("Could not find row $id");
         }
         return $row;
     }
     
     public function getPartidosxFecha($id)
	{
	/*$select = $this->tableGateway->getSql()->select()
		                  ->join('persona', 'usuario.persona_id_persona=persona.id_persona')
                          ->where('usuario.persona_id_persona = ?', $id);*/
        
        $adapter=$this->tableGateway->getAdapter();
        $tablePersona = new TableGateway('partido', $adapter, new Feature\RowGatewayFeature('fecha_torneo_id_fecha_torneo'));
        $results = $tablePersona->select(array('fecha_torneo_id_fecha_torneo' => $id));
        return $results;
	}
    
    /*public function getClubPartido($idClubLocal, $idClubVisita) 
	{
        $adapter=$this->tableGateway->getAdapter();
        $tableClub = new TableGateway('club', $adapter, new Feature\RowGatewayFeature('id_club'));
        $results = $tableClub->select(array('id_club' => $idClub));
        $club = $results->current();
        return $club;
	}*/

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
             if ($this->getFechasTorneo($id)) {
                 $this->tableGateway->update($data, array('id_fecha_torneo' => $id));
             } else {
                 throw new \Exception('FechaTorneo id does not exist');
             }
         }
     }

     public function deleteFechaTorneo($id)
     {
         $this->tableGateway->delete(array('id_fecha_torneo' => (int) $id));
     }
 }