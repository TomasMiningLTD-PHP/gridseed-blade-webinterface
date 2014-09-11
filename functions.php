<?php

function getAllConfigs(){

	$configArray = array();
	if ($handle = opendir('conf')) {
		while (false !== ($entry = readdir($handle))) {
        
        		if ($entry != 'template.conf' && $entry != "." && $entry != "..") {
				$pos = strpos($entry,'active');
				
				if($pos === false){
					array_push($configArray,$entry);
				}
			}
		}
	}

sort($configArray);

closedir($handle);

return $configArray;

}

function setDataPerConfig(){
	$confArray = getAllConfigs();

	foreach($confArray as $key => $entry){
		unlink('conf/active_'.$entry);
		$entryFileString = file_get_contents('conf/'.$entry);
		$newFile = str_replace('%pool%',$_POST[inp_pool],$entryFileString);
		$user = $_POST[inp_user];
		if($_POST[inp_useradd] == 1) {
			$user = $user.($key+1);
		}
		$newFile = str_replace('%user%',$user,$newFile);
		$newFile = str_replace('%pass%',$_POST[inp_pass],$newFile);
		$freq = "inp_freq_".$key;

		$newFile = str_replace('%freq%',$_POST[$freq],$newFile);
		$port = $key;
		if($key < 10){
			$port = "0".$key;
		}
		$newFile = str_replace('%port%',$port,$newFile);
		$newFileName = "conf/active_".$entry;
		$save = file_put_contents($newFileName,$newFile);
		
	
	}



}

function killAllMiners(){
	shell_exec("sudo killall -15 screen");
}


?>