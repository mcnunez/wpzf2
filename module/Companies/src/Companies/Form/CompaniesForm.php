<?php
namespace Companies\Form;

use Zend\Form\Form;

class CompaniesForm extends Form
{
	public function __construct($name = null)
	{
		// we want to ignore the name passed
		parent::__construct('companies');

		$this->add(array(
				'name' => 'idcompanie',
				'type' => 'Hidden',
		));
		$this->add(array(
				'name' => 'name',
				'type' => 'Text',
				'options' => array(
						'label' => 'Name',
				),
		));
		
		$this->add(array(
				'name' => 'id',
				'type' => 'Text',
				'options' => array(
						'label' => 'id user',
				),
		));
		
		$this->add(array(
				'name' => 'address',
				'type' => 'Text',
				'options' => array(
						'label' => 'Adress',
				),
		));
		$this->add(array(
				'name' => 'phone',
				'type' => 'Text',
				'options' => array(
						'label' => 'Phone',
				),
		));

		$this->add(array(
				'name' => 'email',
				'type' => 'Text',
				'options' => array(
						'label' => 'Email',
				),
		));

		$this->add(array(
				'name' => 'cities_idcity',
				'type' => 'Text',
				'options' => array(
						'label' => 'cities_idcity',
				),
		));
		
		
		$this->add(array(
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array(
						'value' => 'Go',
						'id' => 'submitbutton',
				),
		));
	}
}