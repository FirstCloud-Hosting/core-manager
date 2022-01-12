<?php
require('loader.php');
$modules = $Modules->getModules();
if(isset($_GET['edit']) && $Groups->getGroup($_GET['edit'])){
	if(isset($_POST) && isset($_POST['name']) && isset($_POST['note']) && $Groups->getGroup($_GET['edit'])){
		if( $_SESSION['groupId'] == $_GET['edit'] ){
			$_SESSION['result'] = array('status' => 100, 'message' => 'You cannot modify your current group');
		}else{
			$_SESSION['result'] = $Groups->setGroup($_GET['edit'], $_POST['name'], $_POST['note']);
			$Groups->setPermissions($_GET['edit'], $_POST['permissions']);
		}
	}
	$group = $Groups->getGroup($_GET['edit']);
	$groups = $Groups->getGroups();
	$permissions = $Groups->getPermissionsByGroupId($_GET['edit']);
	$result = array();
	foreach ($modules as $module) {
		$found = False;
		foreach ($permissions as $permission) {
			if($permission['module']['id'] == $module['module']['id']){
				$found = True;
				$result[] = array_merge($module, $permission);
				break;
			}
		}
		if($found == False){
			$module['view'] = 0;
			$module['creation'] = 0;
			$module['edition'] = 0;
			$module['deletion'] = 0;
			$result[] = $module;
		}
	}
	$link->set(array('groups' => $groups, 'modules' => $result, 'name' => $group['name'], 'note' => $group['note']));
}else{
	if( isset($_POST) ){
		if(isset($_POST['name']) && isset($_POST['note']) && isset($_POST['permissions'])){
			$groupId = $Groups->insertGroup($_POST['name'], $_POST['note']);
			$_SESSION['result'] = $groupId;
			$Groups->setPermissions($groupId['id'], $_POST['permissions']);
		}elseif(isset($_GET['delete']))
			$_SESSION['result'] = $Groups->deleteGroup($_GET['delete']);
		elseif( isset($_POST['name']) && ( !isset($_POST['note']) || !isset($_POST['permissions']) ) )
			$_SESSION['result'] = array('status' => 100, 'message' => $Translation->translate('Some fields are missing, please fill them all') );
	}
	$groups = $Groups->getGroups();
	$link->set(array('groups' => $groups, 'modules' => $modules));
}
$link->set(array('textUsersGroups' => $Translation->translate('Users Groups'), 'textGroupEdit' => $Translation->translate('Group Edit'), 'textName' => $Translation->translate('Name'), 'textNote' => $Translation->translate('Note'), 'textON' => $Translation->translate('ON'), 'textOFF' => $Translation->translate('OFF'), 'textSelectPermissions' => $Translation->translate('Select Permissions')));
$pageParse = 'core/groups.tpl';
require('footer.php');
?>