<?php
namespace CompaniesTest\Model;

use Companies\Model\CompaniesTable;
use Companies\Model\Companies;
use Zend\Db\ResultSet\ResultSet;
use PHPUnit_Framework_TestCase;

class CompaniesTableTest extends PHPUnit_Framework_TestCase
{
	public function testFetchAllReturnsAllCompanies()
	{
/*		
		$resultSet        = new ResultSet();
		$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway',
				array('select'), array(), '', false);
		$mockTableGateway->expects($this->once())
		->method('select')
		->with()
		->will($this->returnValue($resultSet));

		$companiesTable = new CompaniesTable($mockTableGateway);

		$this->assertSame($resultSet, $companiesTable->fetchAll());
		*/
	}
	
	public function testCanRetrieveAnCompaniesByItsId()
	{
	/*	
		$companies = new Companies();
		$companies->exchangeArray(array('id'     => 123,
				'artist' => 'The Military Wives',
				'title'  => 'In My Dreams'));
	
		$resultSet = new ResultSet();
		$resultSet->setArrayObjectPrototype(new Album());
		$resultSet->initialize(array($album));
	
		$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('select'), array(), '', false);
		$mockTableGateway->expects($this->once())
		->method('select')
		->with(array('id' => 123))
		->will($this->returnValue($resultSet));
	
		$albumTable = new AlbumTable($mockTableGateway);
	
		$this->assertSame($album, $albumTable->getAlbum(123));
	*/	
	}
	
	public function testCanDeleteAnCompaniesByItsId()
	{
	/*	
		$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('delete'), array(), '', false);
		$mockTableGateway->expects($this->once())
		->method('delete')
		->with(array('id' => 123));
	
		$albumTable = new AlbumTable($mockTableGateway);
		$albumTable->deleteAlbum(123);
	*/	
	}
	
	public function testSaveAlbumWillInsertNewCompaniesIfTheyDontAlreadyHaveAnId()
	{
		/*
		$albumData = array('artist' => 'The Military Wives', 'title' => 'In My Dreams');
		$album     = new Album();
		$album->exchangeArray($albumData);
	
		$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('insert'), array(), '', false);
		$mockTableGateway->expects($this->once())
		->method('insert')
		->with($albumData);
	
		$albumTable = new AlbumTable($mockTableGateway);
		$albumTable->saveAlbum($album);
	*/	
	}
	
	public function testSaveAlbumWillUpdateExistingCompaniesIfTheyAlreadyHaveAnId()
	{
	/*	
		$albumData = array('id' => 123, 'artist' => 'The Military Wives', 'title' => 'In My Dreams');
		$album     = new Album();
		$album->exchangeArray($albumData);
	
		$resultSet = new ResultSet();
		$resultSet->setArrayObjectPrototype(new Album());
		$resultSet->initialize(array($album));
	
		$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway',
				array('select', 'update'), array(), '', false);
		$mockTableGateway->expects($this->once())
		->method('select')
		->with(array('id' => 123))
		->will($this->returnValue($resultSet));
		$mockTableGateway->expects($this->once())
		->method('update')
		->with(array('artist' => 'The Military Wives', 'title' => 'In My Dreams'),
				array('id' => 123));
	
		$albumTable = new AlbumTable($mockTableGateway);
		$albumTable->saveAlbum($album);
	*/	
	}
	
	public function testExceptionIsThrownWhenGettingNonexistentCompanies()
	{
	/*	
		$resultSet = new ResultSet();
		$resultSet->setArrayObjectPrototype(new Album());
		$resultSet->initialize(array());
	
		$mockTableGateway = $this->getMock('Zend\Db\TableGateway\TableGateway', array('select'), array(), '', false);
		$mockTableGateway->expects($this->once())
		->method('select')
		->with(array('id' => 123))
		->will($this->returnValue($resultSet));
	
		$albumTable = new AlbumTable($mockTableGateway);
	
		try
		{
			$albumTable->getAlbum(123);
		}
		catch (\Exception $e)
		{
			$this->assertSame('Could not find row 123', $e->getMessage());
			return;
		}
	
		$this->fail('Expected exception was not thrown');
	*/	
	}
	
	
	
}