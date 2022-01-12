<?php
class Views{
	protected $link;

	public function __construct($link){
		$this->link = $link;
	}

	public function displayAlert($result){
		if(isset($result['status'])){
			if($result['status'] == 100){
				$this->link->set(array('displayError' => true, 'message' => $result['message']));
			}else{
				$this->link->set(array('displaySuccess' => true, 'message' => $result['message']));
			}
		}
	}

	public function generateActionsMenu(){
		$uri = substr($_SERVER['REQUEST_URI'], 1);
		$uri = strtok($uri, '?');
		foreach ($_SESSION['permissions'] as $key) {
			if($key['module']['page'] == $uri){
				if($key['view'] == 1){
					$this->link->set(array( 'viewPermission' => true ));
				}

				if($key['creation'] == 1){
					$this->link->set(array( 'creationPermission' => true ));
				}

				if($key['edition'] == 1){
					$this->link->set(array( 'editionPermission' => true ));
				}

				if($key['deletion'] == 1){
					$this->link->set(array( 'deletionPermission' => true ));
				}
			}
		}
	}

	public function displayDemo($validity){
			$this->link->set(array('displayDemo' => true, 'validity' => $validity));
	}
}
?>