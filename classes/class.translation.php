<?php
class Translation{
	protected $locale;

	public function __construct($locale, $work_dir, $memcache){
		$this->locale = $locale;
		$this->work_dir = $work_dir;
		$this->setCurrentUserLanguage();
		$this->memcache = $memcache;
	}

	private function setCurrentUserLanguage(){
	    $result = putenv("LANG=".$this->locale);
	    if (!$result) {
		    exit ('putenv failed');
		}
	    $result = setlocale(LC_ALL, $this->locale . '.UTF-8');
		if (!$result) {
		    exit ('setlocale failed: locale function is not available on this platform, or the given local does not exist in this environment');
		}	    
	    $result = bindtextdomain('core', $this->work_dir . '/files/languages');
	    $result = textdomain('core');
	}

	public function setCustomDomainCurrentUserLanguage($domain){
		bindtextdomain($domain, $this->work_dir . '/files/languages');
	}

	public function translate($message, $domain = 'core'){
		$cacheName = $this->locale . "_" . $domain . "_" . $message;
		if( $this->memcache->get($cacheName) ) return $this->memcache->get($cacheName);
		$message = dgettext($domain, $message);
		$this->memcache->set($cacheName, $message);
		return $message;
	}

	public function arrayTranslate($array, $key, $domain = 'core'){
		$return = [];
		foreach ($array as $arrayKey) {
			$arrayKey[$key] = $this->translate($arrayKey[$key], $domain);
			$return[] = $arrayKey;
		}
		return $return;
	}

	public function menuTranslate($array){
		$return = [];
		foreach ($array as $key) {
			if(strstr($key['module']['page'], 'modules')){
				$moduleName = explode('/', $key['module']['page'])[1];
				$this->setCustomDomainCurrentUserLanguage($moduleName);
				$key['module']['name'] = $this->translate($key['module']['name'], $moduleName);
			}else{
				$key['module']['name'] = $this->translate($key['module']['name'], 'core');
			}
			$return[] = $key;
		}
		return $return;
	}
}
?>