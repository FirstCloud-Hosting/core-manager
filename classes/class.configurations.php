<?php
class Configurations{
	protected $pdo;
	protected $memcache;

	public function __construct(\PDO $pdo, $memcache){
		$this->pdo = $pdo;
		$this->memcache = $memcache;
	}

	public function insertConfiguration($name, $value){
		$req = $this->pdo->prepare("INSERT INTO configurations (name, value) VALUES (:name, :value)");
		$req->bindParam(':name', $name);
		$req->bindParam(':value', $value);
		$req->execute();
		$this->memcache->set($name, $value);
		return ['status' => 200, 'message' => 'Configurations successfully updated'];
	}

	public function getConfigurations(){
		$req = $this->pdo->prepare('SELECT * FROM configurations');
		$req->execute();
		return $req->fetchAll();
	}

	public function getConfiguration($name){
		if( $this->memcache->get($name) ) return $this->memcache->get($name);
		$req = $this->pdo->prepare('SELECT value FROM configurations WHERE name = :name');
		$req->execute(array('name' => $name));
		return $req->fetch()['value'];
	}

	public function setConfiguration($name, $value){
		$req = $this->pdo->prepare('UPDATE configurations SET value = :value WHERE name = :name');
		$req->execute(array('name' => $name, 'value' => $value));
		$req->fetch();
		$this->memcache->set($name, $value);
		return ['status' => 200, 'message' => 'Configurations successfully updated'];
	}

	public function deleteConfiguration($name){
		$req = $this->pdo->prepare('DELETE FROM configurations WHERE name = :name');
		$req->bindParam(':name', $name);
		$req->execute();
		$this->memcache->delete($name);
	}
}
?>