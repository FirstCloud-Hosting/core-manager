<?php

class Menus{
	protected $restClient;

	public function __construct(\RestClient $restClient){
		$this->restClient = $restClient;
		$this->modules = new Modules($restClient);
	}

	public function getTypes(){
		$this->restClient->module('modules/types');
		$result = $this->restClient->get($_SESSION['tokenApi'], null);
		if($result['status'] == 200){
			return $result['data'];
		}
	}

	public function getTypesMenu(){
		if(isset($_SESSION['data']['getTypesMenu'])) return $_SESSION['data']['getTypesMenu'];
		$modules = $this->modules->getModules();
		$types = array();
		foreach ($modules as $module) {
			if(!in_array($module['module']['type'], $types))
				$types[] = $module['module']['type'];
		}
		if(!isset($_SESSION['data']['getTypesMenu'])) $_SESSION['data']['getTypesMenu'] = $types;
		return $types;
	}

	public function getMenusByGroup(){
		if(isset($_SESSION['data']['getMenusByGroup'])) return $_SESSION['data']['getMenusByGroup'];
		$modules = $this->modules->getModules();
		if(isset($_SESSION['data']['getMenusByGroup'])) return $_SESSION['data']['getMenusByGroup'] = $modules;
		return $modules;
	}
	
	public function getTypeByPage($page){
		$modules = $this->modules->getModules();
		foreach ($modules as $module) {
			if($module['module']['page'] == $page)
				return $module['module']['type']['id'];
		}
	}
}
?>