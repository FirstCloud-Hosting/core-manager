<?php
class AppKeys {
	protected $restClient;

	public function __construct(\RestClient $restClient){
		$this->restClient = $restClient;
	}

	public function getAppKeys(){
		$this->restClient->module('appKeys');
		$result = $this->restClient->get($_SESSION['tokenApi']);
		return $result['data'];
	}

	public function editAppKey($appKeyId, $description){
		$this->restClient->module('appKeys');
		$result = $this->restClient->put($_SESSION['tokenApi'], $appKeyId, array('description' => $description));
		return $result;	
	}

	public function getAppKey($appKeyId){
		$this->restClient->module('appKeys');
		$result = $this->restClient->get($_SESSION['tokenApi'], $appKeyId);
		return $result['data'];
	}

	public function insertAppKey(){
		$array = array();
		$this->restClient->module('appKeys');
		$result = $this->restClient->post($_SESSION['tokenApi'], $array);
		return $result;
	}

	public function deleteAppKey($id){
		$this->restClient->module('appKeys');
		$result = $this->restClient->delete($_SESSION['tokenApi'], $id);
		return $result;
	}
}