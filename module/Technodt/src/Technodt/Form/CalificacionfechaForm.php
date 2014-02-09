<?php

namespace Technodt\Form;

use Zend\Form\Form;

class CalificacionfechaForm extends Form
{
    protected $daoFechasTorneo;
	
    public function __construct($name = null)
    {
        parent::__construct('equipo_fantasia');
        $this->setAttribute('method', 'post');
        
        //Texto para el nombre de usuario
        $this->add(array(
            'name' => 'nombreUsuario',
            'attributes' => array(
                'type' => 'text',
                'class' => 'output'
            ),
        ));
		        
        $this->add(array(
            'name' => 'posicion',
            'type' => 'Zend\Form\Element\Select',
            'options' => array(
				'empty_option' => 'Elegir fecha:',
            ),
        ));
        
        //para obtener id_fecha_torneo
        $this->add(array(
            'name' => 'id_fecha',
            'type' => 'Hidden',));

             
        //boton para guardar
     
        $this->add(array(
            'name' => 'verdetalle',
            'attributes' => array(
                'value' => 'Ver Detalle',
                'title' => 'Ver Detalle',
                'type' => 'Submit'
            ),
        ));
		
        
	}
}