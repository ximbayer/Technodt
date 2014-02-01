<?php

namespace Technodt\Form;

use Zend\Form\Element;
use Zend\Form\Form;

class EquipoFantasiaForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('equipo');
        
        //Texto para el nombre de usuario
        $this->add(array(
            'name' => 'nombreUsuario',
            'attributes' => array(
                'type' => 'text',
                'class' => 'output'
            ),
        ));
        
        //Texto para el nombre del equipo fantasia
        $this->add(array(
            'name' => 'nombreEquipo',
            'options' => array(
                'label' => 'Nombre del equipo ',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'input'
            ),
        ));
        
        //SELECTS PARA CLUB, POSICION, COTIZACION
    
        $club = new Element\Select('club');
        $club->setLabel('Club: ');
        $club->setEmptyOption('Todos');
        $club->setValueOptions(array());
        $club->add($club);
     
        $pos = new Element\Select('posicion');
        $pos->setLabel('Posicion: ');
        $pos->setEmptyOption('Todos');
        $pos->setValueOptions(array(
                            'options' => array(
                                    '0' => 'Arquero',
                                    '1' => 'Defensor',
                                    '2' => 'Mediocampista',
                                    '3' => 'Delantero')));
        $pos->add($pos);
     
        $cot = new Element\Select('cotizacionDesde');
        $cot->setLabel('Cotizacion desde: ');
        $cot->setEmptyOption('Seleccione...');
        $cot->setValueOptions(array());
        $cot->add($cot);
     
        $cot2 = new Element\Select('cotizacionHasta');
        $cot2->setLabel('hasta: ');
        $cot2->setEmptyOption('Seleccione...');
        $cot2->setValueOptions(array());
        $cot2->add($cot2);
        
        //selector de pagina
     
        $club = new Element\Select('pagina');
        $club->setLabel('Pagina: ');
        $club->setEmptyOption('1');
        $club->setValueOptions(array());
        $club->add($club);
     
        //botones para guardar y cancelar
     
        $this->add(array(
            'name' => 'guardar',
            'attributes' => array(
                'value' => 'Guardar',
                'title' => 'Guardar',
                'type' => 'Submit'
            ),
        ));
        
        $this->add(array(
            'name' => 'cancelar',
            'attributes' => array(
                'value' => 'Cancelar',
                'title' => 'Cancelar',
                'type' => 'button'
            ),
        ));
        
        //boton para realizar los cambios
        
        $this->add(array(
            'name' => 'cambios',
            'attributes' => array(
                'value' => 'Realizar Cambios',  //aca podemos no poner nada y poner una foto con alguna flecha circular
                'title' => 'Cambios',
                'type' => 'button'
            ),
        ));
        
        //ingresar y eliminar jugadores del equipo
        //no se si van aca, o directamente al HTML para agregarle una imagen
        $this->add(array(
            'name' => 'ingresar',
            'attributes' => array(
                'value' => 'Ingresar',  //aca podemos no poner nada y poner una foto con alguna flecha
                'title' => 'Ingresar',
                'type' => 'button'
            ),
        ));
        
        $this->add(array(
            'name' => 'eliminar',
            'attributes' => array(
                'value' => 'Eliminar',  //aca podemos no poner nada y poner una foto con alguna flecha
                'title' => 'Eliminar',
                'type' => 'button'
            ),
        ));
        
        //desloguearse
        
        $this->add(array(
            'name' => 'deslog',
            'attributes' => array(
                'value' => 'Desloquearse',  //podriamos poner una foto de un boton de power
                'title' => 'Desloquearse',
                'type' => 'button'
            ),
        ));
        
    }
}