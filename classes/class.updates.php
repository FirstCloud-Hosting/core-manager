<?php
class Updates{
	protected $currentVersion;

	public function __construct(){
		global $version;
		$currentVersion = $version;
	}

	public function getLastVersion(){
		$getLastVersion = file_get_contents('https://versions.linufy.app/manager') or die ('Can not detect the latest version');
		if($getLastVersion != '') return $getLastVersion;
		return False;
	}

	public function updateCore(){
		try{
			$temp = tempnam(sys_get_temp_dir(), 'SRVADMCENTER_');
			$fp = fopen($temp, 'w');
			fwrite($fp, file_get_contents("https://downloads.linufy.app/manager.zip"));
			$zipHandle = zip_open($temp);
			
			while($content = zip_read($zipHandle)){

				$filename = zip_entry_name($content);
				$filename = str_replace("SRVAdminCenter-core-master/", "", $filename);
				$folder = dirname($filename);
				if( $folder == "SRVAdminCenter-core-master" ) unset($folder);
				if (substr($filename,-1,1) == '/') continue;

				if (!is_dir(dirname(__FILE__) . '/../' . $folder)) mkdir(dirname(__FILE__) . '/../' . $folder);

				if (!is_dir(dirname(__FILE__) . '/../' . $filename)){
					$contents = str_replace("\r\n", "\n", zip_entry_read($content, zip_entry_filesize($content)));
					if ($filename == 'upgrade.php')
					{
						$upgradeExecution = fopen('upgrade.php','w');
						fwrite($upgradeExecution, $contents);
						fclose($upgradeExecution);
						include('upgrade.php');
						unlink('upgrade.php');
					}else{
						$updateFile = fopen(dirname(__FILE__) . '/../' . $filename, 'w');
						fwrite($updateFile, $contents);
						fclose($updateFile);
						unset($contents);
					}
				}
			}
			return True;
		}catch(Exception $e){
			return False;
		}
	}
}