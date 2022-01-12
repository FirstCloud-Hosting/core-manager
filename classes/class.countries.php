<?php
class Countries{
	protected $restClient;

	public function __construct(\RestClient $restClient){
		$this->restClient = $restClient;
	}

	public function getCountries(){
		$this->restClient->module('countries');
		$result = $this->restClient->get($_SESSION['tokenApi']);
		return $result['data'];
	}
}
?>