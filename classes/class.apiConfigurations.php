<?php
class ApiConfigurations {
	protected $restClient;

	public function __construct(\RestClient $restClient){
		$this->restClient = $restClient;
	}

	public function getConfiguration($name){
		$this->restClient->module('configurations');
		$result = $this->restClient->get($_SESSION['tokenApi'], $name);
		return $result['data'];
	}

	public function setConfiguration($name, $value){
		$array = array('value' => $value);
		$this->restClient->module('configurations');
		$result = $this->restClient->put($_SESSION['tokenApi'], $name, $array);
		return $result;
	}
}