<?php
class Cache{
	protected $cache;

	public function __construct($enabled = False, $host, $port){
		$this->enabled = $enabled;
		if($this->enabled){
			$this->cache = new Memcache;
			$this->cache->connect($host, $port) or die ("Could not connect");
		}
	}

	public function status(){
		return $this->enabled;
	}

	public function set($key, $val){
		if($this->enabled){
			$this->cache->set($key, $val);
		}
	}

	public function get($key){
		if($this->enabled){
			return $this->cache->get($key);
		}
		return False;
	}

	public function delete($key){
		if($this->enabled){
			$this->cache->delete($key);
		}
	}

	public function flush(){
		if($this->enabled){
			$this->cache->flush();
		}	
	}

	public function version(){
		if($this->enabled){
			return $this->cache->getVersion();
		}	
	}

	public function stats(){
		if($this->enabled){
			return $this->cache->getStats();
		}	
	}
}
?>