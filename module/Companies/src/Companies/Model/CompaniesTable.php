<?php
namespace Companies\Model;

use Zend\Db\TableGateway\TableGateway;

class CompaniesTable
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

	public function getCompanies($id)
	{
		$id  = (int) $id;
		$rowset = $this->tableGateway->select(array('idcompanie' => $id));
		$row = $rowset->current();
		if (!$row) {
			throw new \Exception("Could not find row $id");
		}
		return $row;
	}

	public function saveCompanies(Companies $companies)
	{
		$data = array(
				'name'  => $companies->name,
				'id' => $companies->id, // el idusuario
				'address'  => $companies->adress,
				'phone'  => $companies->phone,
				'email'  => $companies->email,
				'cities_idcity'  => $companies->cities_idcity,
		);

		$id = (int)$companies->idcompanie;
		if ($id == 0) {
			$this->tableGateway->insert($data);
		} else {
			if ($this->getCompanies($id)) {
				$this->tableGateway->update($data, array('idcompanie' => $id));
			} else {
				throw new \Exception('Form id does not exist');
			}
		}
	}

	public function deleteCompanies($id)
	{
		$this->tableGateway->delete(array('idcompanie' => $id));
	}

}

