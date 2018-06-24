<?php 


	
	define('SITE_ROOT',dirname(__FILE__));

		$x = $_POST['file'];
		print_r($x);

		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			foreach ($x as $key => $tmp_name) {
				$name = basename($x[$key]);
				$dir = SITE_ROOT.'/uploads/'.$name;
				echo $dir;
				move_uploaded_file($x[$key],"$dir");
			}
		}



	uploadFile("downloads/",$x[0]);
		  
	function uploadFile($directory,$file){

      if ($file != "") {
          if ($directory != "") {
            $directory .="/";
            $path =$directory.$file;
            if (move_uploaded_file($file, $path)) {
              //echo "upload ok";
                echo "moveu";
            }else{
             echo " naão moveu";
            }
          }else{
           echo "fdp";
          }

      }
    }

		

 ?>