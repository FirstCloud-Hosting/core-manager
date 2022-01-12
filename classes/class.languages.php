<?php

require('addons/poeditor/PoEditor.php');

class Languages{
	protected $restClient;

	public function __construct(\RestClient $restClient){
		$this->restClient = $restClient;
	}

	private function copy($s1,$s2) {
		$path = pathinfo($s2);
		if (!file_exists($path['dirname'])) {
			mkdir($path['dirname'], 0777, true);
		}
		if (!copy($s1,$s2))
			return False;
		else
			return True;
	}

	public function getLanguages(){
		$this->restClient->module('languages');
		$result = $this->restClient->get($_SESSION['tokenApi']);
		return $result['data'];
	}

	public function getLanguage($id){
		$this->restClient->module('languages');
		$result = $this->restClient->get($_SESSION['tokenApi'], $id);
		return $result['data'];
	}

	public function getLanguageFiles($code){
		$files = scandir(__DIR__ . '/../files/languages/' . $code . '/LC_MESSAGES');
		$res = array();
		foreach ($files as $file) {
			if(!in_array($file, array('.', '..')) ){
				if( strstr($file, '.po') ){
					array_push($res, explode('.', $file)[0]);
				}
			}
		}
		return $res;
	}

	public function getTranslations($code, $file){
		$po = new PoEditor( __DIR__ . '/../files/languages/' . $code . '/LC_MESSAGES/' . $file . '.po' );
		$po->parse();

		$res = array();

		foreach ($po->getBlocks() as $key => $value) {
			if(isset($value->msgid[0])){
                array_push($res, array('msgid' => $value->msgid[0], 'msgstr' => $value->msgstr[0]));
            }
		}

		return $res;
	}

	public function setTranslation($code, $file, $msgstr, $msgid){
		$po = new PoEditor( __DIR__ . '/../files/languages/' . $code . '/LC_MESSAGES/' . $file . '.po' );
		$po->parse();
		$po->getBlock( $msgstr )->setMsgstr( $msgid );
		file_put_contents( __DIR__ . '/../files/languages/' . $code . '/LC_MESSAGES/' . $file . '.po', $po->compile() );
	}

	public function setLanguage($id, $name, $code){
		$array = array('name' => $name, 'code' => $code);
		$this->restClient->module('languages');
		$result = $this->restClient->put($_SESSION['tokenApi'], $id, $array);
		return $result;
	}

	public function insertLanguage($name, $code){
		$files = scandir(__DIR__ . '/../files/languages/fr_FR/LC_MESSAGES');
		foreach ($files as $file) {
			if (!in_array($file, array('.', '..') ))
				if( $this->copy(__DIR__ . '/../files/languages/fr_FR/LC_MESSAGES/' . $file, __DIR__ . '/../files/languages/' . $code . '/LC_MESSAGES/' . $file) == False)
					return array('status' => 100, 'message' => 'Unable to create language folder');
		}
		$array = array('name' => $name, 'code' => $code);
		$this->restClient->module('languages');
		$result = $this->restClient->post($_SESSION['tokenApi'], $array);
		return $result;
	}

	public function deleteLanguage($id){
		$this->restClient->module('languages');
		$result = $this->restClient->delete($_SESSION['tokenApi'], $id);
		return $result;
	}
}
?>