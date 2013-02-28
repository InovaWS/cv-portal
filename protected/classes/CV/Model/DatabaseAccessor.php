<?php
namespace CV\Model;

abstract class DatabaseAccessor
{
	protected $db;
	
	public function setDatabaseConnection($db)
	{
		$this->db = $db;
	}
	
	public function getDatabaseConnection()
	{
		return $this->db;
	}
	
}