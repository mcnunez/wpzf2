<?php
namespace Companies\Model;

// Add these import statements
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Companies
{
	public $idcompanie;
	public $name;
	public $id; // idusuario
	public $address;
	public $phone;
	public $email;
	public $cities_idcity;
	

	public function exchangeArray($data)
	{
		$this->idcompanie     = (isset($data['idcompanie'])) ? $data['idcompanie'] : null;
		$this->name = (isset($data['name'])) ? $data['name'] : null;
		$this->id  = (isset($data['id'])) ? $data['id'] : null;
		$this->address = (isset($data['addres'])) ? $data['addres'] : null;
		$this->phone = (isset($data['phone'])) ? $data['phone'] : null;
		$this->email = (isset($data['email'])) ? $data['email'] : null;
		$this->cities_idcity = (isset($data['cities_idcity'])) ? $data['cities_idcity'] : null;
	}
	
	public function setInputFilter(InputFilterInterface $inputFilter)
	{
		throw new \Exception("Not used");
	}
	
	public function getArrayCopy()
	{
		return get_object_vars($this);
	}
	 
	public function getInputFilter()
	{
		if (!$this->inputFilter) {
			$inputFilter = new InputFilter();
	
			$inputFilter->add(array(
					'name'     => 'idcompanie',
					'required' => true,
					'filters'  => array(
							array('name' => 'Int'),
					),
			));
	
			$inputFilter->add(array(
					'name'     => 'name',
					'required' => true,
					'filters'  => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
					),
					'validators' => array(
							array(
									'name'    => 'StringLength',
									'options' => array(
											'encoding' => 'UTF-8',
											'min'      => 1,
											'max'      => 100,
									),
							),
					),
			));
	
			$inputFilter->add(array(
					'name'     => 'cities_idcity',
					'required' => true,
					'filters'  => array(
							array('name' => 'Int'),
					),
			));
				
			$this->inputFilter = $inputFilter;
		}
	
		return $this->inputFilter;
	}	
}