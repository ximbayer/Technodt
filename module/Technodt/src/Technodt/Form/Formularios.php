<?php
namespace Technodt\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Form\Factory;

class Formularios extends Form
{

    public function __construct($name = null)
        {
            parent::__construct($name);
            $this->setAttribute('method', 'post');
            
            
            //Campo Nombre:
            $this->add(array(
                'name'=>'nombre',
                'options'=>array(
                    'label'=>'Nombre Completo:',
                ),
                'attributes'=>array(
                    'type' => 'text',
                ),
            ));
            
            //Campo Documento:
            $this->add(array(
                'name'=>'documento',
                'options'=>array(
                    'label'=>'Documento:<br>',
                ),
                'attributes'=>array(
                    'type' => 'input',
                ),
            ));
            
            //Campo email:
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
                    'value' => 'Ingresar',
                    'title' => 'Inicia Sesión'
                    ),   
             ));
            
            /*DNI Options No Funciona con el Factory 
            $this->add(array(
                'name'    => 'tipo_documento',
                'attributes' => array(
                    'type'    => 'select',
                ),
                'options' => array(
                                '0' => 'DNI',
                                '1' => 'LE',
                                '2' => 'LC',
                                'label'   => 'Tipo de Documento:<br>',
                ),
            ));*/

            //Campo Contraseña
            $this->add(array(
                'name'=>'pass',
                'options'=>array(
                    'label'=>'Contraseña:<br>',
                ),
                'attributes'=>array(
                    'type' => 'password',
                ),
            ));
           
        }
}