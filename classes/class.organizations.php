<?php
class Organizations {
	protected $restClient;

	public function __construct(\RestClient $restClient){
		$this->restClient = $restClient;
	}

	public function getOrganizations(){
		$this->restClient->module('organizations');
		$result = $this->restClient->get($_SESSION['tokenApi']);
		return $result['data'];
	}
}
?>