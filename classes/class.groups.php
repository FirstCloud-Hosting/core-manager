<?php
class Groups{
	protected $restClient;

	public function __construct(\RestClient $restClient){
		$this->restClient = $restClient;
	}

	public function getGroups(){
		$this->restClient->module('groups');
		$result = $this->restClient->get($_SESSION['tokenApi']);
		return $result['data'];
	}

	public function getGroup($id){
		$this->restClient->module('groups');
		$result = $this->restClient->get($_SESSION['tokenApi'], $id);
		return $result['data'];
	}

	public function getPermissionsByGroupId($groupId){
		$this->restClient->module('groups');
		$result = $this->restClient->get($_SESSION['tokenApi'], $groupId . '/permissions');
		return $result['data'];
	}

	public function setGroup($id, $name, $note){
		$array = array('name' => $name, 'note' => $note);
		$this->restClient->module('groups');
		$result = $this->restClient->put($_SESSION['tokenApi'], $id, $array);
		return $result;
	}

	public function setPermissions($groupId, $permissions){
		$this->restClient->module('groups');
		foreach ($permissions as $permission => $value) {
			$permissions[$permission]['view'] = 1;
			if(isset($value['creation'])) $permissions[$permission]['creation'] = 1; else $permissions[$permission]['creation'] = 0;
			if(isset($value['edition'])) $permissions[$permission]['edition'] = 1; else $permissions[$permission]['edition'] = 0;
			if(isset($value['deletion'])) $permissions[$permission]['deletion'] = 1; else $permissions[$permission]['deletion'] = 0;	
		}
		$array = array('permissions' => json_encode($permissions));
		$result = $this->restClient->put($_SESSION['tokenApi'], $groupId . '/permissions', $array);
		return $result;
	}

	public function insertGroup($name, $note){
		$array = array('name' => $name, 'note' => $note);
		$this->restClient->module('groups');
		$result = $this->restClient->post($_SESSION['tokenApi'], $array);
		return $result;
	}

	public function deleteGroup($id){
		$this->restClient->module('groups');
		$result = $this->restClient->delete($_SESSION['tokenApi'], $id);
		return $result;
	}
}
?>