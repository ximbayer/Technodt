<?php

/**
 * @author César Cancino
 * @copyright 2013
 */
namespace Technodt\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Captcha;
use Zend\Form\Factory;

class CalificacionjugadoresForm extends Form
{
    public function __construct($name = null)
     {
        parent::__construct($name);
        
        $this->add(array(
            'name' => 'nombre',
            'options' => array(
                'label' => 'Nombre Completo',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'input'
            ),
        ));
        
        //Select button
        $puntaje = new Element\Select('puntaje');
        $puntaje->setLabel('Cuál es su puntaje?');
        $puntaje->setValueOptions(array('1','2','3','4','5','6','7','8','9','10'));
        $this->add($puntaje);
        
        //Select button
        $golesConv = new Element\Select('golesConv');
        $golesConv->setLabel('Goles convertidos?');
        $golesConv->setValueOptions(array('1','2','3','4','5','6','7','8','9','10'));
        $this->add($golesConv);
        
        //Select button
        $penalesConv = new Element\Select('penalesConv');
        $penalesConv->setLabel('Penales convertidos?');
        $penalesConv->setValueOptions(array('1','2','3','4','5','6','7','8','9','10'));
        $this->add($penalesConv);
        
        // checkbox
        $condiciones = new Element\Checkbox('condiciones');
        $condiciones->setLabel('Jugo mas de 20 minutos??');
        $this->add($condiciones);
        
        $amarilla = new Element\Checkbox('amarillas');
        $amarilla->setLabel('Tuvo amarillas??');
        $this->add($amarilla);
        
        $roja = new Element\Checkbox('rojas');
        $roja->setLabel('Tuvo roja??');
        $this->add($roja);
        
        $this->add(array(
            'name' => 'figura',
            'options' => array(
                'label' => 'Figura de la cancha',
            ),
            'attributes' => array(
                'type' => 'text',
                'class' => 'input'
            ),
        ));
   
        //campo oculto
        $oculto = new Element\Hidden('oculto');
        $this->add($oculto);
        
        //
        $this->add(array(
            'name' => 'guardar',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Guardar',
                'title' => 'Guardar'
            ),
        ));
     
     }
}

?>