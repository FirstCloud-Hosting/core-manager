<?php
class RestClient {
	protected $apiUrl;
	private $module;

	public function __construct($apiUrl){
		$this->apiUrl = $apiUrl;
	}

	public function module($module){
		$this->module = $module;
	}

	protected function connect($url, $context)
	{
		$stream = fopen($url, 'r', false, $context);
		if ($stream !== false){
			$content = stream_get_contents($stream);
			$header = stream_get_meta_data($stream);

			if(isset($_SESSION['debug']) && $_SESSION['debug']){
				array_push($_SESSION['debugRest'], $url);
				array_push($_SESSION['debugRest'], $content);
				array_push($_SESSION['debugRest'], $header);
			}

			fclose($stream);
			return $content;
		}else{
			#die('An error occurred while connecting to the API');
			return false;
		}
	}

	protected function getRemoteIP(){
		if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}else{
			return $_SERVER['REMOTE_ADDR'];
		}
	}

	protected function getContext($method, $content = null){
		$opts = array(
				'http'=>array(
					'method' => $method, 
					'header' => ['Content-type: application/x-www-form-urlencoded',
								'X-Forwarded-For: ' . $this->getRemoteIP() ],
				),
				"ssl"=>array(
					"verify_peer"=>false,
					"verify_peer_name"=>false,
				)
		);

		if ($content !== null){
			if (is_array($content)){
				$content = http_build_query($content);
			}
			$opts['http']['content'] = $content; 
		}

		if(isset($_SESSION['debug'])){
			array_push($_SESSION['debugRest'], $opts);
		}

		return stream_context_create($opts);
	}

	public function get($token = null, $id = null, $content = null){
		$url = $this->apiUrl . $this->module;
		if($id !== null) $url = $url  . '/' . $id;
		if($token !== null) $url = $url  . '?token=' . $token;
		if($content !== null){
			foreach ($content as $key => $value) {
				$url = $url  . '&' . $key . '=' . $value;
			}
		}
		return json_decode($this->connect($url, $this->getContext('GET')), true);
	}

	public function post($token = null, $content, $id = null){
		$url = $this->apiUrl . $this->module;
		if($id !== null) $url = $url  . '/' . $id;
		if($token !== null) $url = $url  . '?token=' . $token;
		$context = $this->getContext('POST', $content);
		return json_decode($this->connect($url, $context), true);
	}

	public function put($token = null, $id, $content){
		$url = $this->apiUrl . $this->module;
		if($id !== null) $url = $url  . '/' . $id;
		if($token !== null) $url = $url  . '?token=' . $token;
		return json_decode($this->connect($url, $this->getContext('PUT', $content)), true);
	}

	public function delete($token = null, $id, $content = null){
		$url = $this->apiUrl . $this->module;
		if($id !== null) $url = $url  . '/' . $id;
		if($token !== null) $url = $url  . '?token=' . $token;
		if($content === null) return json_decode($this->connect($url, $this->getContext('DELETE')), true);
		else return json_decode($this->connect($url, $this->getContext('DELETE', $content)), true);
	}
}