<?php

namespace Video7\Form;

use Zend\Captcha\AdapterInterface as CaptchaAdapter;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Captcha; 
use Zend\Form\Factory;

class Formularios extends Form
{
        public function __construct($name = null)
        {
            parent::__construct($name);
            
            $this->add(array(
                'name'=>'nombre',
                'options'=>array(
                    'label'=>'Nombre Completo:',
                ),
                'attributes'=>array(
                    'type' => 'text',
                ),
            ));
            
            $this->add(array(
                'type' => 'Zend\Form\Element\Email',
                'name' => 'email',
                'options' => array(
                'label' => 'Su direcci&oacute;n de Email:',
                ),
            ));
            
            //$this->add(new Element\Csrf('security'));
            $this->add(array(
                'name' => 'send',
                'type'  => 'Submit',
                'attributes' => array(
                    'value' => 'Enviar',
                    'title' => 'Envía el Formulario'
                    ),   
             ));
            
            $this->add(array(
                'name'=>'pass',
                'options'=>array(
                    'label'=>'Contraseña:',
                ),
                'attributes'=>array(
                    'type' => 'password',
                ),
            ));
           
        }
}
