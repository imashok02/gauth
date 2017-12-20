<?php

class storedb {

	protected $mongo;

	public function __construct()
	{
		$this->mongo = //mongo connection
	}

	public function query($query)
	{
		return $this->mongo->query($query);
	}
}