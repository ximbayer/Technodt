<?php
namespace Video7\Model\Entity;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

class Usuarios extends TableGateway
{
    private $name;
    private $email;
    
    public function __construct(Adapter $adapter = null, $databaseSchema = null, 
        ResultSet $selectResultPrototype = null)
    {
        return parent::__construct('Usuario', $adapter, $databaseSchema, 
            $selectResultPrototype);
    }
    
    public function getAttributesAction($datos=array())
    {
        $this->name  = $datos['name'];
        $this->email = $datos['email'];
    }

        public function fetchAll()
    {
        $resultSet = $this->select();
        return $resultSet->toArray();
    }
    
    public function getUsuarioById($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array('id_usuario' => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new \Exception("Could not find row $id");
        }
        return $row;
    }
    
    public function addAction($data=array())
    {
        self::getAttributesAction($data);
        $arreglo = array(
            'id_usuario'         => '16',
            'nombre'     => $data['nombre'],
            'email'      => $data['email']
        );
        $this->insert($arreglo);
    }

    public function updateUsuarioAction($id, $nombre, $email)
    {
        $data = array(
            'nombre' => $nombre,
            'email'  => $email,
        );
        $this->update($data, array('id_usuario' => $id));
    }
    
    
}

