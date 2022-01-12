<?php
class Modules{
	protected $restClient;

	public function __construct(\RestClient $restClient){
		$this->restClient = $restClient;
	}

	public function getModules(){
		$this->restClient->module('modules');
		if( !empty($this->modules) )
			return $this->modules;
		else{
			$result = $this->restClient->get($_SESSION['tokenApi']);
			$this->modules = $result['data'];
			return $result['data'];
		}
		
	}

	public function getModule($id){
		$this->restClient->module('modules');
		$result = $this->restClient->get($_SESSION['tokenApi'], $id);
		return $result['data'];
	}

	public function setModule($id, $typeId, $name, $page){
		$array = array('type_id' => $typeId, 'name' => $name, 'page' => $page);
		$this->restClient->module('modules');
		$result = $this->restClient->put($_SESSION['tokenApi'], $id, $array);
		return $result;
	}

	public function insertModule($typeId, $name, $page){
		$array = array('type_id' => $typeId, 'name' => $name, 'page' => $page, 'forAdmin' => 0);
		$this->restClient->module('modules');
		$result = $this->restClient->post($_SESSION['tokenApi'], $array);
		return $result;
	}

	public function deleteModule($id){
		$this->restClient->module('modules');
		$result = $this->restClient->delete($_SESSION['tokenApi'], $id);
		return $result;
	}
}
?>